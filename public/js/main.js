const deletebtn = document.getElementById('delete-btn');

deletebtn.addEventListener('click',function(e){
    if(confirm('削除しますか？')){
        return true;
    }else{
        alert('削除を取り消しました');
        e.preventDefault();
    }
})
