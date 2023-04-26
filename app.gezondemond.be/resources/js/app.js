import './bootstrap';

//import './vendor';

import '@fortawesome/fontawesome-free/js/all.min'

import axios from 'axios'
import VueAxios from 'vue-axios'

import router from './router'

import {createApp} from 'vue/dist/vue.esm-bundler.js'

const app = createApp({});

import CalendarAppointments from './components/calendar/Calendar.vue'
import SpokenLanguagesCreate from './components/persons/SpokenLanguagesCreate.vue'
import SpokenLanguagesEdit from './components/persons/SpokenLanguagesEdit.vue'

app.use(router);
app.use(VueAxios, axios)

app
    .component('spoken-languages-create', SpokenLanguagesCreate)
    .component('spoken-languages-edit', SpokenLanguagesEdit)
    .component('calendar-appointments', CalendarAppointments)

app.mount('#main-content');
