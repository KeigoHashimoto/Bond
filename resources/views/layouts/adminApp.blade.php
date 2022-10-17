<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    {{-- <link href={{ mix('/css/app.css') }} rel="stylesheet"> --}}
    <link rel="stylesheet" href={{ asset('/css/style.css') }}>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
    <title>Admin</title>
</head>
<body>

    @include('commons.error')
    <div id="app">

        @yield('content')

    </div>

<script>
    const deleteBtn = document.querySelectorAll('.delete');
    for(let i=0; i<deleteBtn.length; i++){
        deleteBtn[i].addEventListener('click',(e)=>{
        let msg = confirm('本当に削除しますか？');
        if(!msg){
            e.preventDefault();
        };
    });
    }
</script>

</body>
</html>