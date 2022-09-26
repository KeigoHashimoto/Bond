require('./bootstrap');

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import TestComponent from './components/test.vue'

createApp({
    components:{
        TestComponent,
    }
}).mount('#app');

