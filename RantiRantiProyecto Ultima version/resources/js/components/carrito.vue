<template>
    <div>
        <div class="carrito">{{descripcioncarrito.length}}</div>
    </div>
</template>
<script>
import {mapState,mapMutations} from 'vuex';
export default {
    mounted(){
       
    },
    computed:{
        ...mapState(['descripcioncarrito'])
    }
}
</script> 
<style>
.carrito{
    width: 2.5em;
    height: 2.5em;
    text-align: center;
    background-image: url("~/images/carrito.png");
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
    color: black;
}
</style>