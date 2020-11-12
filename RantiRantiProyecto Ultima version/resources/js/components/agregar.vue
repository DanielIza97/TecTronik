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
        <div v-if="cantidad>0">
        <div v-if="verificado.valido===true">
            <a href="/login" class="btn btn-block btn-add my-4">Agregar</a>
        </div>
        <div v-else>
            <button class="btn btn-block btn-add my-4" @click="agregarAlCarrito(product,cantidad)"> Agregar </button>
        </div>
    </div>
    <ul>
        <div v-for="(descripcion,index) in descripcioncarrito" :key="index">
            <li>
                {{descripcion.nombreproducto}}  {{carritocatidad[index]}}
                <button @click="eliminardelCarrito(index)">
                    eliminar
                </button>
            </li>
        </div>
    </ul>
</div>
</template>
<script>
import {mapState,mapMutations} from 'vuex';
export default {
    props:['medida','product'],
    data:function(){
        return {
            cantidad:0,
            render:0,
            verificado:'',
            carritodescripcion:[],
            carritocatidad:[],
        }
    },
    mounted(){
            axios.get('/confirmaautentificacion')
            .then((response)=>{
                this.verificado=response.data.data;
            })
            .catch(function(error){
                console.log(error)
            });
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
            {
                this.cantidad=this.cantidad+1;
            }
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
        },
        agregarAlCarrito:function(product,cantidad){
            this.carritodescripcion.push(product);
            this.carritocatidad.push(cantidad);
            this.$store.dispatch("agregar1",product);
            this.$store.dispatch("agregar2",cantidad);
        },
        eliminardelCarrito:function(index){
            var producto = this.carritodescripcion[index];
            var cantidad=this.carritocatidad[index];
            this.carritodescripcion.splice(index,1);
            this.carritocatidad.splice(index,1);
            this.$store.dispatch("eliminar1",index);
            this.$store.dispatch("eliminar2",index);
        }
    },
    computed:{
        ...mapState(['descripcioncarrito'])
    }
    /*
    props:['medida','product'],
    data:function(){
        return {
            cantidad:0,
            render:0,
            verificado:'',
            carritodescripcion:[],
            carritocatidad:[],
        }
    },
    mounted(){
            axios.get('/confirmaautentificacion')
            .then((response)=>{
                this.verificado=response.data.data;
            })
            .catch(function(error){
                console.log(error)
            });
            
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
            {
                this.cantidad=this.cantidad+1;
            }
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
        },
        agregarAlCarrito:function(producto,canti){
            this.$store.dispatch('agregar',this.carritodescripcion);
           
        },
        eliminardelCarrito:function(index){
            this.$store.dispatch("eliminar",this.carritodescripcion);
        }

    },
    computed:{
        ...mapState(['descripcioncarrito'])
    }*/
}
</script>