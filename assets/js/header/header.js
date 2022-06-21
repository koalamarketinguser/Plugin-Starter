export function popup() {
   const searchBtn = document.querySelector('#search-btn a');
   const sideBar = document.querySelector('#sidebar');
   const widgetArea = document.querySelector('#widget-area a.close-btn');
   searchBtn.addEventListener('click', () => {
      sideBar.classList.toggle('show');
   })
   widgetArea.addEventListener('click', () => {
      sideBar.classList.remove('show');
   })

}
export function account_menu_display() {
   const accountBtn = document.querySelector('.acount-options a');
   const menuAccount = document.querySelector('.menu-account-inner');
   const body = document.querySelector('body');

   document.addEventListener('click', function (event) {
      if (menuAccount.contains(event.target) || accountBtn.contains(event.target)) {
         if (!menuAccount.classList.contains('show')) { menuAccount.classList.add('show'); }

      }
      else {
         menuAccount.classList.remove('show');
      }

   })
}

export function minicart_show() {
   (function ($) {
      $(document).ready(function () {
         $('.mini-cart-item , .widget.woocommerce.widget_shopping_cart').mouseenter(function () {
            $('.widget.woocommerce.widget_shopping_cart').show();
         })
         $('.widget.woocommerce.widget_shopping_cart').mouseleave(function () {

            $(this).delay(1000).fadeOut(1000);

         })

      });
   })(jQuery);
}
export function dropdown_menu_show() {
   const dropdown_links = document.querySelectorAll('#menu-main-menu li a');

   dropdown_links.forEach((link) => {

      link.addEventListener('mouseover', function (e) {
         const menu_link = e.target.parentElement.querySelector('ul.dropdown-menu');
         if (menu_link != null) {
            menu_link.setAttribute('style', 'display: block');
            [menu_link, e.target].forEach((element) => {
               element.onmouseleave = function (e) {
                  if (menu_link == e.target || e.target) {
                     menu_link.setAttribute('style', 'display: none');

                  }
               }
               element.onmouseover = function (e) {
                  if (menu_link == e.target) {
                     menu_link.setAttribute('style', 'display: block');

                  }


               }
            })
         }

      }, true);

   })

}
export function sticky_header() {
   const header = document.querySelector('.main-navigation.navbar ');
   window.addEventListener('scroll', () => {
      var top = window.pageYOffset || document.documentElement.scrollTop;
      if (top > 120 || top == 120) {
         header.classList.add('sticky');
      }
      else {
         if (header.classList.contains('sticky')) {
            header.classList.remove('sticky');
         }
      }
   })
}
