<template>
    <div class="load-filter">
        <div class="load-icon">■</div>
    </div>
</template>

<script>

</script>

<style>
.load-filter{
    width: 100%;
    height: 100vh;
    position:fixed;
    top: 0;
    left: 0;
    z-index:999;
    background: #0000008d;
}

.load-icon{
    font-size:5rem;
    color:#fff;
    position:fixed;
    top: 50%;
    left: 50%;
    transform:translate(-50%,-50%);
    animation:rotate 2s infinite;
}

@keyframes rotate{
    0%{
        transform:rotate(0);
    }
    100%{
        transform:rotate(360deg);
    }
}

</style>