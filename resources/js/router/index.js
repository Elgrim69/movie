import { createRouter, createWebHistory } from 'vue-router'

import PeoplesAdminIndex from '@/components/peoples/PeoplesAdminIndex.vue'
import PeoplesIndex from '@/components/peoples/PeoplesIndex.vue'
import PeoplesCreate from "../components/peoples/PeoplesCreate.vue";
import PeoplesEdit from "../components/peoples/PeoplessEdit.vue";

const routes = [
    {
        path: '/dashboard',
        name: 'peoples.admin.index',
        component: PeoplesAdminIndex
    },
    {
        path: '/',
        name: 'peoples.index',
        component: PeoplesIndex
    },
    {
        path: '/peoples/create',
        name: 'peoples.create',
        component: PeoplesCreate
        
    },
    { 
        path: '/peoples/:id/edit',
        name: 'peoples.edit',
        component: PeoplesEdit,
        props: true
    }, 
];

export default createRouter({
    history: createWebHistory(),
    routes
})