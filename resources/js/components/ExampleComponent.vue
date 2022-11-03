<template>
    <div>
        <!-- 全ての発言を取得 -->
        <div v-for="opinion in opinions" :key="opinion.id">
            <!-- 掲示板作成のためのopinionを表示させない -->
            <div v-if="opinion.user_id != null">
                <div v-if="opinion.board_id === board.id">
                    <!-- 発言者が自分の場合 -->
                    <div v-if="opinion.user_id === authUser.id">
                        <!-- 発言の内容 -->
                        <div class="self-opinion">
                            <div class="opinion-contents">
                                <div class="opinion-content-myself">
                                    {{ opinion.opinion }}
                                    <img :src="'/uploads/' + opinion.img_path" alt="" class="self-opinion-img">
                                </div>
                            </div>
                            <!-- 全てのユーザーを取得 -->
                            <div v-for="user in users" :key="user.id">
                                <div class="opinion-profile">
                                    <a :href="'/show/' + user.id"><img v-if="user.id === opinion.user_id" :src="imgSrc" alt="" class="opinion-profile-img"></a>
                                    <div v-if="user.id === opinion.user_id" class="opinion-user">{{ user.name }}</div>
                                </div>
                            </div>  
                        </div>            
                    </div>
                    <!-- 発信者が自分以外の場合 -->
                    <div v-else>
                        <div class="opinion">
                            <!-- 全てのユーザーを取得 -->
                            <div v-for="user in users" :key="user.id">
                                <div class="opinion-profile">
                                    <img v-if="user.id === opinion.user_id" :src="imgSrc" alt="" class="opinion-profile-img">
                                    <div v-if="user.id === opinion.user_id" class="opinion-user">{{ user.name }}</div>
                                </div>
                            </div>  
                            <div class="opinion-contents">
                                <div class="opinion-content">
                                    <p>{{ opinion.opinion }}</p>
                                </div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data(){
            return{
                opinions:[],
                users:[],
                authUser:[],
            };
        },
        props:{
            board:String,
        },
        methods:{
            getMessages(){
                axios.get('/community-app/messages').then(response => this.opinions = response.data);
            },
            getUsers(){
                axios.get('/community-app/users').then(response => this.users = response.data);
            },
            getAuthUser(){
                axios.get('/community-app/authUser').then(response => this.authUser = response.data);
            }, 
        },
        computed:{
            imgSrc(){
                return require("../upload/" + user.profile_img)
            },
        },
        mounted() {
            this.getMessages();
            this.getUsers();
            this.getAuthUser();

            Echo.channel('chat')
                .listen('MessageCreated',(e) => {
                    this.getMessages();
                });
        },
    }
</script>
