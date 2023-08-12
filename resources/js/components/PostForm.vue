<template>
    <form @submit.prevent='posted'>
        <textarea class="textarea" v-model="opinion"></textarea>
        <!-- <div class="form-group">
            <label for="">画像</label>
            <input type="file">
        </div> -->
        <input type="hidden" value="board_id">
        <div class="submit-btn">
            <input type="submit" value="送信" class="white">
        </div>
    </form>

    <NowLoading v-show="load"></NowLoading>
</template>

<script>
import NowLoading from './NowLoading.vue';

export default{
    data(){
        return{
            load:false,
            url:'/community-app/'+this.board_id+'/opinions',
            opinion:'',
        }
    },
    props:['board_id'],
    methods:{
        posted(){
            this.load =true;
            const data = {
                opinion:this.opinion,
                board_id:this.board_id,
            }
            axios.post(this.url,data)
            .then(res =>{
                console.log(res);
            })
            .catch(()=>{

            })
            .finally(()=>{
                this.load=false;
                this.opinion='';
            })
        }
    },
    components:{
        NowLoading
    }
}

</script>

<style>

</style>