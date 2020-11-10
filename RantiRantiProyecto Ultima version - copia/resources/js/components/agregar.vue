<template>
<div class="pt1">
    <button class=" btn fa fa-minus-circle text-lg-center" @click="resta"  ></button>
                <div class="linea" v-if="medida=='M1'">
                    <div class="linea pt1">
                    <div class="linea" v-if="cantidad===0.5">{{render=''}} media libra</div>
                    <div class="linea" v-else-if="cantidad==1">{{render}} libra</div>
                    <div class="linea" v-else-if="render===1&cantidad===1.5">{{render}} libra y media</div>
                    <div class="linea" v-else-if="(cantidad/0.5)%2===0&cantidad!=0">{{render}} libras</div>
                    <div class="linea" v-else-if="cantidad!=0">{{render}} libras y media</div>
                    <div class="linea" v-else>{{render}}</div>
                </div>
                </div>
                <div class="linea2" v-else>
                    {{cantidad}}
                </div>
    <button class=" btn fa fa-plus-circle" @click="suma"></button>
    <button class="btn btn-block btn-add my-4"> Agregar </button>
</div>
</template>
<script>
export default {
    props:['medida'],
    data:function(){
        return {
            cantidad:0,
            render:0,
        }
    },
    methods:{
        suma:function(){
            if(this.medida=='M1')
            {
                if(this.render=='')
                    this.render=0;
                if((this.cantidad/0.5)%2==1)
                    this.render=this.render+1;
                this.cantidad=this.cantidad+0.5;
            }
            else
                this.cantidad=this.cantidad+1;
        },
        resta:function(){
            if(this.medida=='M1')
            {
                if(this.cantidad==0.5)
                    this.render=0;
                if(this.cantidad>0){
                    if((this.cantidad/0.5)%2==0)
                        this.render=this.render-1;
                    this.cantidad=this.cantidad-0.5;
                }
            }
            else
            {
                if(this.cantidad>0)
                    this.cantidad=this.cantidad-1;
            }
        }
    }
}
</script>