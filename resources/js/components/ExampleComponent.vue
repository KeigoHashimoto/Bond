<template>
    <div ref="container" class="container">
        <div ref='opinions'>
            <!-- 全ての発言を取得 -->
            <div v-for="opinion in opinions" :key="opinion.id">
                <!-- 掲示板作成のためのopinionを表示させない -->
                <div v-if="opinion.user_id != null">
                    <div v-if="opinion.board_id === board.id">
                        <!-- 自分の投稿 -->
                        <div v-if="opinion.user_id === authUser.id">
                            <div>
                                <div class="self-opinion" >
                                    <div class="self-opinion-content">{{ opinion.opinion }}<br>
                                        <div  v-show="opinion.img_path != ''">
                                            <!-- <a :href="'/uploads/' + opinion.img_path">
                                                <img :src="'/uploads/' + opinion.img_path" alt="" class="opinion-img">
                                            </a> -->
                                            <a :href="'/community-app/uploads/' + opinion.img_path">
                                                <img :src="'/community-app/uploads/' + opinion.img_path" alt="" class="opinion-img">
                                            </a>
                                        </div>
                                    </div>
        
                                    <div class="self-opinion-profile">
                                        <!-- <a :href="'/show/' + authUser.id">
                                            <img class="self-opinion-profile-img" :src="'/uploads/' + authUser.profile_img" alt="">
                                        </a> -->
                                        <a :href="'/community-app/show/' + authUser.id">
                                            <img class="self-opinion-profile-img" :src="'/community-app/uploads/' + authUser.profile_img" alt="">
                                        </a>
                                        <p>{{ authUser.name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <!-- 自分以外の投稿 -->
                            <div v-for="user in users" :key="user.id">
                                <div class="opinion">
                                    <div v-if="user.id === opinion.user_id" class="opinion-profile">
                                        <!-- <a :href="'/show/' + user.id">
                                            <img class="opinion-profile-img" :src="'/uploads/' + user.profile_img" alt="">
                                        </a> -->
                                        <a :href="'/community-app/show/' + user.id">
                                            <img class="opinion-profile-img" :src="'/community-app/uploads/' + user.profile_img" alt="">
                                        </a>
                                        <p>{{ user.name }}</p>
                                    </div>
                
                                    <div class="opinion-content" v-if="opinion.user_id === user.id">{{ opinion.opinion }}<br>
                                        <div  v-show="opinion.img_path != ''">
                                            <!-- <a :href="'/uploads/' + opinion.img_path">
                                                <img :src="'/uploads/' + opinion.img_path" alt="" class="opinion-img">
                                            </a> -->
                                            <a :href="'/community-app/uploads/' + opinion.img_path">
                                                <img :src="'/community-app/uploads/' + opinion.img_path" alt="" class="opinion-img">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div ref="more" class="more"></div>
        </div>
    </div>
<NowLoading v-show="load"></NowLoading>
</template>

<script>
import axios from 'axios';
import NowLoading from './NowLoading.vue';

    export default {
        data(){
            return{
                opinions:{},
                users:[],
                authUser:[],
                load:false,
                nextPageUrl:'',
            };
        },
        props:{
            board:String,
        },
        methods:{
            async getPage(url){
                this.load = true;
                    await axios.get(url)
                    .then(response => {
                        this.opinions = this.opinions.concat(response.data.data);
                        this.nextPageUrl = response.data.next_page_url;
                    })
                    .catch(err => {
                    }).finally(()=>{
                        this.load=false;
                    })
            },
            async getMessages(){
                if(window.location.hostname =='localhost'){
                    this.load = true;
                    await axios.get('/messages')
                    .then(response => {
                        this.opinions = response.data.data;
                        this.nextPageUrl = response.data.next_page_url;
                    })
                    .catch(err => {
                    })
                    .finally(()=>{
                        this.load=false;
                        this.autoPageLoader();
                    })

                }else{
                    this.load = true;
                    axios.get('/community-app/messages')
                    .then(response => {
                        this.opinions = response.data.data;
                        this.nextPageUrl = response.data.next_page_url;
                    })
                    .catch(err => {
                    })
                    .finally(()=>{
                        this.load=false;
                        this.autoPageLoader();
                    })
                }
            },
            getUsers(){
                if(window.location.hostname =='localhost'){
                    axios.get('/users').then(response => this.users = response.data);

                }else{
                    axios.get('/community-app/users').then(response => this.users = response.data);
                }
            },
            getAuthUser(){
                if(window.location.hostname =='localhost'){
                    axios.get('/authUser').then(response => this.authUser = response.data);
                }else{
                    axios.get('/community-app/authUser').then(response => this.authUser = response.data);
                }
            }, 

            getPageOnScroll(){
                let container = this.$refs.container;
                let more = this.$refs.more;
                container.addEventListener('scroll',() =>{
                    let containerRect = container.getBoundingClientRect();
                    let moreRect = more.getBoundingClientRect();

                    if(containerRect.bottom > moreRect.top){
                        if(this.load) return;
                        this.getPage(this.nextPageUrl);
                    }
                })
            },

            async autoPageLoader(){
                while(true){
                    if(this.nextPageUrl != null){
                        let containerRect = this.$refs.container.getBoundingClientRect();
                        let moreRect = this.$refs.more.getBoundingClientRect();
                        console.log(containerRect.bottom + ' : ' + moreRect.top);

                        if(containerRect.bottom > moreRect.bottom){
                            await this.getPage(this.nextPageUrl);
                        }else{
                            break;
                        }
                    }else{
                        break;
                    }
                }
            }
        },
        mounted() {
            this.getMessages();
            this.getUsers();
            this.getAuthUser();
            this.getPageOnScroll();

            Echo.channel('chat')
                .listen('MessageCreated',(e) => {
                    this.getMessages();
                });
        },
        components:{
            NowLoading  
        }
    }
</script>

<style scoped>
.container{
    height: 700px;
    overflow: auto;
}
.more{
    width: 100%;
    height: 1rem;
}
</style>
