import './bootstrap';

//import './vendor';

import '@fortawesome/fontawesome-free/js/all.min'

import 'bootstrap/dist/js/bootstrap.bundle.min'

import axios from 'axios'
import VueAxios from 'vue-axios'

import router from './router'

import {createApp} from 'vue/dist/vue.esm-bundler.js'

const app = createApp({});

import CalendarAppointments from './components/calendar/Calendar.vue'
import SpokenLanguagesCreate from './components/persons/SpokenLanguagesCreate.vue'
import SpokenLanguagesEdit from './components/persons/SpokenLanguagesEdit.vue'
import AddressesCreate from './components/persons/AddressesCreate.vue'
import AddressesEdit from './components/persons/AddressesEdit.vue'
import AppointmentAddressesCreate from './components/appointments/AppointmentAddressesCreate.vue'
import AppointmentAddressesEdit from './components/appointments/AppointmentAddressesEdit.vue'
import AppointmentPersonCreate from './components/appointments/AppointmentPersonCreate.vue'
/*import AppointmentPersonEdit from './components/appointments/AppointmentPersonEdit.vue'*/
import AddressRegionCreate from './components/addresses/AddressRegionCreate.vue'
import AddressRegionEdit from './components/addresses/AddressRegionEdit.vue'

app.use(router);
app.use(VueAxios, axios)

app
    .component('calendar-appointments', CalendarAppointments)
    .component('spoken-languages-create', SpokenLanguagesCreate)
    .component('spoken-languages-edit', SpokenLanguagesEdit)
    .component('addresses-create', AddressesCreate)
    .component('addresses-edit', AddressesEdit)
    .component('appointment-addresses-create', AppointmentAddressesCreate)
    .component('appointment-addresses-edit', AppointmentAddressesEdit)
    .component('appointment-person-create', AppointmentPersonCreate)
    /*.component('appointment-person-edit', AppointmentPersonEdit)*/
    .component('address-region-create', AddressRegionCreate)
    .component('address-region-edit', AddressRegionEdit)


app.mount('#main-content');
