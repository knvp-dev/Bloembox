
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(function(){
    $('.cart-btn').on("click", (e) => {
      e.preventDefault();
      $('.shopping-cart').toggleClass("is-collapsed").toggleClass("is-expanded");
      $('.toggle-shoppingcart-btn').toggleClass("is-collapsed").toggleClass("is-expanded");
    });

    $('.mobile-menu-toggle').on('click', (e) => {
      e.preventDefault();
      $('.mobile-menu').toggleClass('mobile-is-expanded').toggleClass('mobile-is-collapsed');
    });
});
