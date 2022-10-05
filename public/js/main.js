//admin
const adminBtns = document.getElementById('admin-btns');
const admin = document.getElementById('admin');


const dropDown = (btn,content) => {
    $(btn).on('click',() => {
        $(content).slideToggle();
    });
};

dropDown(admin,adminBtns);


new Vue({
    el: '#app',
    data:{
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
    },
})

new Vue({
    el: '#header',
    data: {
        menuSwitch:false,
    }
})