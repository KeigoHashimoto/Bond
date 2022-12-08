$('#delete-btn').on('click',function(e){
    if(confirm('本当に削除しますか？')){
        return true;
    }else{
        alert('削除を取り消しました。');
        e.preventDefault();
    }
})