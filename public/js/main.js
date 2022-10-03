//header
const headerIcon = document.getElementById('nav-icon');
const navList = document.getElementById('nav-list');

//admin
const adminBtns = document.getElementById('admin-btns');
const admin = document.getElementById('admin');


const dropDown = (btn,content) => {
    $(btn).on('click',() => {
        $(content).slideToggle();
    });
};

dropDown(admin,adminBtns);
dropDown(headerIcon,navList);

new Vue({
    el: '#app',
    data:{
        isActive: false,
        activeTab:'',
        onOff1:false,
        onOff2:false,
        onOff3:false,
        onOff4:false,
        activeProfileTab: 'default',
        sideSwitch:false,
        modalSwitch:false,
        readActive:false,
    },
})