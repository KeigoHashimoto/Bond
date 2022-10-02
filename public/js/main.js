//header
const headerIcon = document.getElementById('nav-icon');
const navList = document.getElementById('nav-list');

//board_schedules
const schedulesBtn = document.getElementById('schedules-icon');
const schedules = document.getElementById('schedules');
const filter = document.getElementById('filter');

//readed 
const readedBtn = document.getElementById('readed-icon');
const readedUsers = document.getElementById('readed-users');

//admin
const adminBtns = document.getElementById('admin-btns');
const admin = document.getElementById('admin');


const modal = (btn,content,filter) => {
    $(btn).on('click',(e) => {
        $(content).slideToggle();
        $(filter).fadeToggle();
    });
};

const dropDown = (btn,content) => {
    $(btn).on('click',() => {
        $(content).slideToggle();
    });
};

dropDown(admin,adminBtns);
dropDown(headerIcon,navList);
modal(schedulesBtn,schedules,filter);
modal(schedules,schedules,filter)
modal(filter,schedules,filter);
dropDown(readedBtn,readedUsers);

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
    },
})