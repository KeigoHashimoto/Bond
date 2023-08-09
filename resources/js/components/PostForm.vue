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
</template>

<script>
export default{
    data(){
        return{
            load:false,
            url:'/'+this.board_id+'/opinions',
            opinion:'',
        }
    },
    props:['board_id'],
    methods:{
        posted(){
            const data = {
                opinion:this.opinion,
                board_id:this.board_id,
            }
            axios.post(this.url,data)
            .then(res =>{
                console.log(res);
            })
        }
    }

}

</script>

<style>

</style>