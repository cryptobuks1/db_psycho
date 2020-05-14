
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

//Импорт необходимых компонетов
    // require('./bootstrap');
    // import VueRouter from 'vue-router';
    import 'babel-polyfill';
    import Vue from 'vue'
    import App from './App.vue';
    import {store} from './store/store';
    import VueIziToast from 'vue-izitoast';
    import VeeValidate from 'vee-validate';
    import 'bootstrap-vue/dist/bootstrap-vue.css'
    // import { Breadcrumb } from 'bootstrap-vue/es/components';
    import Vuebar from 'vuebar';
    import axios from 'axios';
    import { VueEditor } from "vue2-editor";
    import cssVars from 'css-vars-ponyfill';
    import { VueMaskDirective } from 'v-mask'
    import VuebRouter from 'vue-brouter';
    const moment = require('moment');





// Конфиги для пакетов
    const VVconfig={
        fieldsBagName:'fieldsVV',
        events:'blur'
    };

// Vue.use
    Vue.directive('mask', VueMaskDirective);
    // Vue.use(Breadcrumb);
    Vue.use(VuebRouter);
    Vue.use(Vuebar);
    // Vue.use(BootstrapVue);
    Vue.use(require('vue-moment'), {
        moment
    })
    // Vue.use(VueRouter);
    Vue.use(VueIziToast);
    Vue.use(VeeValidate, VVconfig);

// Настройки VuebRouter
    const router =  new VuebRouter({
        mode: 'history',
        routes: [],
    });
    router.beforeEach((to,from, next)=>{
       store.commit('deleteNotification', to.path);
       next();
    });

// Общие функции и прототипы
    Vue.prototype.$http = axios;
    Array.prototype.clean = function(deleteValue) {
        for (var i = 0; i < this.length; i++) {
            if (this[i] == deleteValue) {
                this.splice(i, 1);
                i--;
            }
        }
        return this;
    };
    function stringToPath(string) {
        let rePropName = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))/g;
        let reEscapeChar = /\\(\\)?/g;
        var result = [];
        string.replace(rePropName, function(match, number, quote, string) {
            result.push(quote ? string.replace(reEscapeChar, '$1') : (number || match));
        });
        return result;
    };
    Vue.prototype.$getProp = function (obj, keys, defaultValue) {
    keys = Array.isArray( keys )? keys : stringToPath(keys);
    // keys = keys.filter(e=>!Number.isInteger(+e));
    obj = obj[keys[0]];
    if( obj && keys.length>1 ){
        return Vue.prototype.$getProp( obj, keys.slice(1));
    }
    return obj === undefined? defaultValue : obj;
};

// Конфиг Vue
    Vue.config.productionTip = true;
    Vue.config.devtools = true;
// Подключение Vue
    const app = new Vue({
      el: '#app',
        router,
        store,
      render: h => h(App)
    });
    global.app = app;

// Конвертация img в svg
var Mmixin = {

    methods: {
        imgtosvg: async function () {
            let svgList = store.getters.getSvgStore;
            for(const item of Array.from($('img.svg'))){
                var $img = $(item),
                    imgID = $img.attr('id'),
                    imgClass = $img.attr('class'),
                    imgURL = $img.attr('src');
                if(svgList.hasOwnProperty(imgURL)){
                    $img.replaceWith(svgList[imgURL]);
                }else{
                    if(!imgURL) return
                    try {
                        const res = await app.$http.get(imgURL);
                        var $svg = res.data;
                        $img.replaceWith($svg);
                        svgList[imgURL] = $svg;
                    }
                    catch (error) {
                        console.log(Object.keys(error), error.message);
                    }
                }
            };
            store.commit('setSvgStore',svgList);
        }
    }
};
Vue.mixin( Mmixin );

//Полифилы
    if (!Element.prototype.closest) {

        // Костыль для ie11

        // реализуем
        Element.prototype.closest = function (css) {
            var node = this;
            while (node) {
                if (node.matches(css)) {return node;}
                else node = node.parentElement || node.parentNode;
            }
            return null;
        };
    }
    if (!Element.prototype.matches) {
        // Костыль для ie11
        Element.prototype.matches =
            Element.prototype.matchesSelector ||
            Element.prototype.mozMatchesSelector ||
            Element.prototype.msMatchesSelector ||
            Element.prototype.oMatchesSelector ||
            Element.prototype.webkitMatchesSelector ||
            function(s) {
                var matches = (this.document || this.ownerDocument).querySelectorAll(s),
                    i = matches.length;
                while (--i >= 0 && matches.item(i) !== this) {}
                return i > -1;
            };
        Node.prototype.matches = function(s) {
            // Костыль для ie11


            var matches = this.querySelectorAll(s);
            var    i = this.querySelectorAll(s).length;
            while (--i >= 0 && matches.item(i) !== this) {}
            return i > -1;
        };
    }
    // Костыль для ie11
    cssVars();
    if ('NodeList' in window && !NodeList.prototype.forEach) {
    console.info('polyfill for IE11');
    NodeList.prototype.forEach = function (callback, thisArg) {
        thisArg = thisArg || window;
        for (var i = 0; i < this.length; i++) {
            callback.call(thisArg, this[i], i, this);
        }
    };
}


export const EventBus = new Vue();
