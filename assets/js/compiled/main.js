!function(){var __webpack_modules__={"./assets/js/header/header.js":function(){eval("\n\n//# sourceURL=webpack://vc_ase/./assets/js/header/header.js?")},"./assets/main.js":function(__unused_webpack_module,__webpack_exports__,__webpack_require__){"use strict";eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _assets_js_header_header_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../assets/js/header/header.js */ \"./assets/js/header/header.js\");\n/* harmony import */ var _assets_js_header_header_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_assets_js_header_header_js__WEBPACK_IMPORTED_MODULE_0__);\n// Webpack Imports\n\n\n\n\n(function () {\n\t'use strict';\n\n\t// Focus input if Searchform is empty\n\t[].forEach.call(document.querySelectorAll('.search-form'), (el) => {\n\t\tel.addEventListener('submit', function (e) {\n\t\t\tvar search = el.querySelector('input');\n\t\t\tif (search.value.length < 1) {\n\t\t\t\te.preventDefault();\n\t\t\t\tsearch.focus();\n\t\t\t}\n\t\t});\n\t});\n\n\t// Initialize Popovers: https://getbootstrap.com/docs/5.0/components/popovers\n\tvar popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle=\"popover\"]'));\n\tvar popoverList = popoverTriggerList.map(function (popoverTriggerEl) {\n\t\treturn new bootstrap.Popover(popoverTriggerEl, {\n\t\t\ttrigger: 'focus',\n\t\t});\n\t});\n})();\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n//# sourceURL=webpack://vc_ase/./assets/main.js?")}},__webpack_module_cache__={};function __webpack_require__(e){var _=__webpack_module_cache__[e];if(void 0!==_)return _.exports;_=__webpack_module_cache__[e]={exports:{}};return __webpack_modules__[e](_,_.exports,__webpack_require__),_.exports}__webpack_require__.n=function(e){var _=e&&e.__esModule?function(){return e.default}:function(){return e};return __webpack_require__.d(_,{a:_}),_},__webpack_require__.d=function(e,_){for(var r in _)__webpack_require__.o(_,r)&&!__webpack_require__.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:_[r]})},__webpack_require__.o=function(e,_){return Object.prototype.hasOwnProperty.call(e,_)},__webpack_require__.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})};var __webpack_exports__=__webpack_require__("./assets/main.js")}();