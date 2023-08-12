require('./bootstrap');

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import PostForm from './components/PostForm.vue'


createApp({
    components:{
        ExampleComponent,
        PostForm
    },
    data(){
        return{
            rsStyle:true,
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
            //cell
            cellTab:false,
        };
    },
}).mount('#app');
