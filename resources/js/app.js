/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import * as VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
    load: {
        // key: '',
        key: 'AIzaSyAc0LNlzgwzA0wP7t2iZ-RPPgfhEoxo05I',
        // libraries: 'places'
    }
})
Vue.filter('convertToNumber', function (value) {
    return Number(value)
})
const app = new Vue({
    el: '#app',
    data() {
        return {
            restaurants: [],
            infoWindowOptions: {
                pixelOffset: {
                    width: 0,
                    height: -35
                }
            },
            activeRestaurant: {},
            infoWindowOpened: false
        }
    },
    created() {
        axios.get('/api/restaurents')
            .then(res => {
                this.restaurants = res.data
            })
    },
    methods: {
        convertToFloat(res) {
            return {lat: parseFloat(res.latitude), lng: parseFloat(res.longitude)}
        },
        showGmapInfo(res) {
            this.activeRestaurant = res;
            this.infoWindowOpened = false
            this.infoWindowOpened = true
        },
        closeInfoWindowClose() {
            this.activeRestaurant = {}
            this.infoWindowOpened = false
        },
        handleMapClick(e) {
            console.log(e)
            let newRes = {
                name: "Place Holder",
                hours: "00:00am-00:00pm",
                city: "HoChiMinh",
                address:'HoChiMinh',
                latitude:e.latLng.lat(),
                longitude:e.latLng.lng()
            }
            this.restaurants.push(newRes)
            axios.post('/api/restaurents',newRes )
                .then(res => {})
                .catch(err => {
                    console.log(err.response.statusText)
                })
        }
    },
    computed: {
        mapCenter() {
            if (this.restaurants.length) {
                return this.convertToFloat(this.restaurants[0])
            }
            return {
                lat: 10, lng: 10
            }
        },
        infoWindowPosition() {
            return this.convertToFloat(this.activeRestaurant)
        }
    }
});
