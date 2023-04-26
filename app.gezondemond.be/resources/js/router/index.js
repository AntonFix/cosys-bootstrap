import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    {
        name: 'SpokenLanguagesEdit',
        path: '/person/:id/edit',
        component: () => import('../components/persons/SpokenLanguagesEdit.vue'),
        props: true
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
