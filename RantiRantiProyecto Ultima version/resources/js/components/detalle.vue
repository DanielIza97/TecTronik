<template>
    <article>
        <section>
            <div class="container">
                <div class="row justify-content-start">
                    <h3 class="col-12 ">{{receta.nombrereceta}}</h3>
                </div>
                <div class="row justify-content-center">
                    <img class="col-10 py-4" :src="`/imagesrecetas/${receta.imagenreceta}`">
                </div>
                <div class="row">
                    <div  class="col-md-4 offset-md-1">
                        <h4 class="py-4">Preparacion</h4>
                        <p class="pl-5">{{receta.descripcionreceta}}</p>
                    </div>
                    <div class="offset-md-1">  
                        <h4>Ingredientes</h4>
                        <div v-for="ingrediente in ingredientes" :key="ingrediente.idproducto">
                            <div v-if="ingrediente.idmedida === 'M1'">
                                <ul class="icon" >
                                    <i class="fa fa-check-circle "></i>{{ingrediente.pivot.cantidad}} de {{ingrediente.nombreproducto}}
                                </ul>
                            </div>
                            <div v-else>
                                unidad
                            </div>
                        </div>
                    </div>
                </div>   
                        {{ingredientes}}
            </div>
        </section>
    </article>
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
<style scoped>
</style>