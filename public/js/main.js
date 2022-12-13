const deletebtn = document.querySelectorAll('.delete');

for(i=0; i<deletebtn.length; i++){
    deletebtn[i].addEventListener('click',function(e){
        if(confirm('本当に削除しますか？')){
            return true;
        }else{
            alert('削除を中止しました。');
            e.preventDefault();
        }
    })
}