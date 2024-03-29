/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./range_change');
require('./cog');
require('./axios_query');
require('./number_format')
require('./date_format');
require('./inittooltips');
require('./admin/mark.ajax');
require('./admin/color');
require('./admin/pack');
require('./admin/complect');
require('./admin/car');
require('./admin/company');
require('./admin/banners');
require( 'jquery-ui/ui/widgets/sortable.js');
require('./config_sortable.js');
require('slick-carousel');
require('./one_height');
require('./ankor_scroll');
require('./config_slick');
require('./navbar_fixed');
require('./front/model_image');
require('./front/model_complect_list');
require('./front/stock');
require('./front/company');
require('./front/favorites');
require('./front/configurator');
require('./front/car');
require('./front/call_modal');
require('./front/callback');
require('./front/compare');
//window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
