import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import router from './router'
import PeopleAdminIndex from '@/components/peoples/PeoplesAdminIndex.vue';
import PeopleIndex from '@/components/peoples/PeoplesIndex.vue';


createApp({
    components: {
        PeopleAdminIndex
    }
}).use(router).mount('#app')

createApp({
    components: {
        PeopleIndex
    }
}).use(router).mount('#home')
