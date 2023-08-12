<template>
    <form @submit.prevent='posted'>
        <textarea class="textarea" v-model="opinion"></textarea>
        <div class="form-group">
            <label for="">画像</label>
            <input type="file" ref="file" @change="handleFileChange">
        </div>
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
            file:null
        }
    },
    props:['board_id'],
    methods:{
        handleFileChange(e){
            this.file = e.target.files[0];
        },
        posted(){
            this.load =true;
            const formData = new FormData();
            formData.append('image',this.file);
            formData.append('opinion',this.opinion);
            formData.append('board_id',this.board_id);
            // const data = {       
            //     opinion:this.opinion,
            //     board_id:this.board_id,
            //     image:this.file,
            // }
            axios.post(this.url,formData)
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