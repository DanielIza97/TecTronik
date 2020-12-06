<template>
<div class="pt1">
    <button class="btn fa fa-minus-circle text-lg-center" @click="resta"  ></button>
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
    <div v-if="cantidad>0" class="row justify-content-center ">
        <div v-if="verificado.valido===true" class="text-center">
            <button class="btn1 btn-outline-success close " @click="agregar(cantidad)"> Agregar </button>
        </div>
        <div v-else >
            <a href="/login" class="btn1 btn-outline-success close ">Agregar</a>
        </div>
    </div>
</div>
</template>
<script>
export default {
    props:['medida','product'],
    data:function(){
        return {
            cantidad:0,
            render:0,
            verificado:'',
            carritodescripcion:
                {id:this.product.idproducto,
                    nombre:this.product.nombreproducto,
                    precio:this.product.precioproducto,
                    detalle:this.product.detalleproducto,
                    canti:0
                }
            ,
            carritocatidad:[],
            respuesta:[],
            agregarurl:'',
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
        },
        eliminardelCarrito:function(index){
            this.respuesta.splice(index,1);
            this.agregarurl='/eliminardelcarrito';
            axios.post(this.agregarurl,this.respuesta)
            .then(response=>{
                this.respuesta=response.data.data;
            })
            .catch(function(error){
                console.log(error)
            });
        },
        agregar:function(canti){
            //this.carritodescripcion.push(this.product);
            this.agregarurl='/agregarcarrito/'+canti;
            axios.post(this.agregarurl,this.product)
            .then(response=>{
                this.respuesta=response.data.data;
                toastr.success('Agregado al carrito correctamente');
                
            })
            .catch(function(error){
                console.log(error)
            });
        }
    }
}
</script>