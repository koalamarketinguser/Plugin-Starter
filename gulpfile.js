const gulp = require('gulp');
const browserSync = require('browser-sync');
const server = browserSync.create();
const fonter = require("gulp-fonter");
const del = require("del");
const babel = require("gulp-babel");
const uglify = require("gulp-uglify");
const webpack = require("webpack-stream");
/**
 * Define all source paths
 */

var paths = {
    styles: {
        src: './assets/*.scss',
        dest: './assets/css'
    },
    admin_styles: {
        src: './assets/scss/WPElements/admin.scss',
        dest: './assets/css'
    },
    scripts: {
        src: ['./assets/main.js'],
        dest: './assets/js/compiled'
    },
    fonts: {
        src: "./assets/webfonts/**/*.{eot,ttf,otf,otc,ttc,ttc,woff,woff2,svg}",
        watch: "./assets/webfonts/*.{eot,ttf,otf,otc,ttc,ttc,woff,woff2,svg}",
        dest: "./assets/webfonts/maps"
    }
};

/**
 * Fonts
 * 
 * fonts()async
 */
const fonts = async () => {
    if (paths.fonts.dest)
        del(paths.fonts.dest)
    return gulp.src(paths.fonts.src)
        .pipe(fonter({ formats: ["ttf", "eot", "woff", "svg", "woff2"] }))
        .pipe(gulp.dest(paths.fonts.dest))
}
/**
 * Webpack compilation: http://webpack.js.org, https://github.com/shama/webpack-stream#usage-with-gulp-watch
 * 
 * build_js()
 */

function build_js() {
    if (paths.scripts.dest)
        del(paths.scripts.dest)
    return gulp.src(paths.scripts.src)
        .pipe(babel())
        .pipe(webpack({
            mode: "development"
        }))
        .pipe(uglify())
        .pipe(
            gulp.dest(paths.scripts.dest)
        )
        .pipe(
            server.stream() // Browser Reload
        );
}



/**
 * SASS-CSS compilation: https://www.npmjs.com/package/gulp-sass
 * 
 * build_css()
 */

function build_css() {
    const sass = require('gulp-sass')(require('sass')),
        postcss = require('gulp-postcss'),
        sourcemaps = require('gulp-sourcemaps'),
        autoprefixer = require('autoprefixer'),
        cssnano = require('cssnano');

    const plugins = [
        autoprefixer(),
        cssnano(),
    ];

    return gulp.src(paths.styles.src)
        .pipe(
            sourcemaps.init()
        )
        .pipe(
            sass()
                .on('error', sass.logError)
        )
        .pipe(
            postcss(plugins)
        )
        .pipe(
            sourcemaps.write('./')
        )
        .pipe(
            gulp.dest(paths.styles.dest)
        )
        .pipe(
            server.stream() // Browser Reload
        );
}
function build_admin_css() {
    const sass = require('gulp-sass')(require('sass')),
        postcss = require('gulp-postcss'),
        sourcemaps = require('gulp-sourcemaps'),
        autoprefixer = require('autoprefixer'),
        cssnano = require('cssnano');

    const plugins = [
        autoprefixer(),
        cssnano(),
    ];

    return gulp.src(paths.admin_styles.src)
        .pipe(
            sourcemaps.init()
        )
        .pipe(
            sass()
                .on('error', sass.logError)
        )
        .pipe(
            postcss(plugins)
        )
        .pipe(
            sourcemaps.write('./')
        )
        .pipe(
            gulp.dest(paths.admin_styles.dest)
        )
        .pipe(
            server.stream() // Browser Reload
        );
}


/**
 * Watch task: Webpack + SASS
 * 
 * $ gulp watch
 */

gulp.task('watch',
    function () {
        // Modify "dev_url" constant and uncomment "server.init()" to use browser sync
        server.init({
            proxy: 'localhost/luxury',
        });
        gulp.watch(paths.scripts.src, build_js);
        gulp.watch([paths.styles.src, './assets/scss/**/**/*.scss', './*.php'], build_css);
        gulp.watch(paths.admin_styles.src, build_admin_css);

        browserSync.reload
    }
);

exports.fonts = fonts;