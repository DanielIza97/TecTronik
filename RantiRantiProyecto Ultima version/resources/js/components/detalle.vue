<template>
    <div class="container m5 m">
        <div v-if="tipo==='recetas'">
            <div class="row justify-content-start">
                <h2 class="col-12 ">{{receta.nombrereceta}}</h2>
            </div>
            <div class="row justify-content-start">
                <img class="offset-md-2 py-4" :src="`/imagesrecetas/${receta.imagenreceta}`"  alt=" "  width=600 height="300">
            </div>
            <div class="row">
                <div  class="col-md-4 offset-md1">
                    <h3 class="py-4">Preparacion</h3>
                    <p class="pl-5">{{receta.descripcionreceta}}</p>
                </div>
                <div class="offset-md1 col-md-5">  
                    <h3 class="py-4">Ingredientes</h3>
                    <div v-for="ingrediente in ingredientes" :key="ingrediente.idproducto">
                        <div v-if="ingrediente.idmedida === 'M1'">
                            <ul class="icon" >
                                <i class="fa fa-check-circle "></i>{{ingrediente.pivot.cantidad}} de {{ingrediente.nombreproducto}}
                            </ul>
                        </div>
                        <div v-else>
                            <ul class="icon" >
                                <i class="fa fa-check-circle "></i>{{ingrediente.pivot.cantidad}} {{ingrediente.nombreproducto}}
                            </ul>
                        </div>
                        <div class="offset-md1 pt1">
                            <h6 >Comprar ingrediente</h6>
                            <agregar-page :medida="ingrediente.idmedida" :product="ingrediente"></agregar-page>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
        <div v-else>
            <div class="row offset-md-1">
                <img class="card-body2 justify-content-center" :src="`/imagesproducto/${producto.imagenproducto}`" alt=" ">
                <div class="col-sm ">
                    <h2 class="line-bottom text-center align-self-start">{{producto.nombreproducto}}</h2>
                    <h5>Detalle:</h5>
                    <p>{{producto.detalle}}</p>
                    <div v-if="producto.idmedida==='M2'">
                        <div>
                            <h5  class="custom-control-inline" >Tamaño por unidad:</h5>
                            <p class="custom-control-inline">{{producto.tamanoproducto}}</p>
                        </div>
                        <div>
                            <h5 class="custom-control-inline">Precio: </h5><i class="fa fa-dollar"></i>
                            <p class="custom-control-inline">{{producto.precioproducto}}</p>
                        </div>
                    </div>
                    <div v-else>
                        <h5 class="custom-control-inline">Precio por libra: </h5><i class="fa fa-dollar"></i>
                        <p class="custom-control-inline">{{producto.precioproducto}}</p>
                    </div>
                    <div class="text-center">
                        <h6 >Agregar producto al carrito</h6>
                        <agregar-page :medida="producto.idmedida" :product="producto"></agregar-page>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</template>
<script>
export default {
    props:['tipo','detallenombre'],
    data:function()
        {
            return {
                docu:"",
                producto:"",
                receta:'',
                ingredientes:'',
                rutaproductop:'/detallesp/'+this.detallenombre,
                rutaproductor:'/detallesr/'+this.detallenombre,
                rutaproductoi:'/detallesi/'+this.detallenombre,
            }
        },
        mounted() {
            if(this.tipo=='productos'){
                this.loadDetallep();
            }
            else
                this.loadDetaller();
        },
        methods:{
            loadDetallep:function(){
                axios.get(this.rutaproductop)
                .then((response)=>{
                    this.producto=response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
            },
            loadDetaller:function(){
                axios.get(this.rutaproductor)
                .then((response)=>{
                    this.receta=response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
                axios.get(this.rutaproductoi)
                .then((response)=>{
                    this.ingredientes=response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
            }
        }
    }
</script>