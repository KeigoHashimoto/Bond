const deletebtn = document.querySelectorAll('.delete-btn');

for(i=0; i<deletebtn.length; i++){
    deletebtn[i].addEventListener('click',function(e){
        if(confirm('まじで削除する？')){
            return true;
        }else{
            alert('削除を中止したよ！');
            e.preventDefault();
        }
    })
}