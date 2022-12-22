require('./bootstrap');

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'


createApp({
    components:{
        ExampleComponent,
    },
    data(){
        return{
            isActive: false,
            activeTab:'',
            onOff1:false,
            onOff2:false,
            onOff3:false,
            onOff4:false,
            activeProfileTab: 'group',
            sideSwitch:false,
            modalSwitch:false,
            readActive:false,
            menuSwitch:false,
            //tables
            tableTab:false,
            tableEdit:false,
            //cell
            cellTab:false,
            cellEdit:false,

        };
    },
}).mount('#app');
