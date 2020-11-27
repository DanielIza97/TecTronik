<template>
    <div class="">
        <a href="/vercarrito">
        <div class="circulo text-center">{{Items}}</div>
        <div class="carrito"></div>
        </a>
    </div>
</template>
<script>
export default {
    data:function(){
        return{
            items:0,
        }
    },
    computed:{
        Items(){
        axios.get('/borrarcarrito/items')
            .then((response)=>{
                this.items=response.data.data;
                
            })
            .catch(function(error){
                console.log(error)
            });
            return this.items.items;
        }
    }
}
</script> 
<style>
.carrito{
    width: 40px;
    height: 40px;
    text-align: center;
    background-image: url("~/images/car.png");
    background-repeat: no-repeat;
    background-size: contain;
    background-position: top;
    color: black;
}
.circulo{
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background-color: #006ca8;
    color:white;
    margin-left: 10px;
}
</style>