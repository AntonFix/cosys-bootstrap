import {createRouter, createWebHistory} from 'vue-router'

import AppointmentsIndex from '../components/appointments/Index.vue'

const routes = [
    {
        path: '/appointments-index',
        name: 'appointments.index',
        component: AppointmentsIndex
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
