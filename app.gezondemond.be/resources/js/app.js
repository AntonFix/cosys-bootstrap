import './bootstrap';

import '@fortawesome/fontawesome-free/js/all.min'



/*
import {createApp} from 'vue'

import App from './components/App.vue'

createApp(App).mount("#vue-app")
*/


import {createApp, h} from 'vue';

import App from './components/App.vue';

const app = createApp({
    render: () => h(App)
});

import axios from 'axios'
import VueAxios from 'vue-axios'

import router from './router'

import 'primevue/resources/primevue.min.css'  //core css
import 'primevue/resources/themes/saga-blue/theme.css' //import theme
import 'primeicons/primeicons.css'  //icons

import PrimeVue from 'primevue/config'

import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';
import Row from 'primevue/row';

import Button from 'primevue/button';
import Toast from 'primevue/toast';
import ToastService from 'primevue/toastservice';

import DataTable from 'primevue/datatable';
import InputText from 'primevue/inputtext';

import Calendar from 'primevue/calendar';

app.use(router);
app.use(PrimeVue);

app.use(VueAxios, axios)

app.component('Column', Column);
app.component('ColumnGroup', ColumnGroup);
app.component('Row', Row);

app.component('InputText', InputText);
app.component('Calendar', Calendar);

app.component('Button', Button);

app.component('Toast', Toast);
app.use(ToastService);

app.component('DataTable', DataTable);

app.mount('#vue-app');

