<template>
    <div>
        <h3 class="container text-lg-left">Productos</h3>
        <div>
            <div class="row justify-content-center">
                <div  v-for="categoriap in categoriasp" :key="categoriap.id">
                    <div class="card">
                        <div class="card-body text-lg-center" >
                            <a class="dropdown-item" v-bind:href="/productos/+categoriap.nombre">
                            <img v-bind:src="/imagestipoprod/+categoriap.foto" width="250" height="175"/></a>
                        </div>
                        <div class="card-header text-lg-center" >
                            <a class="dropdown-item" v-bind:href="/productos/+categoriap.nombre">{{categoriap.nombre}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="container text-lg-left">Recetas</h3>
        <div>
            <div class="row justify-content-center">
                <div v-for="categoriar in categoriasr" :key="categoriar.idtiporeceta">
                    <div class="card" >
                        <div class="card-body text-lg-center">
                            <a class="dropdown-item" v-bind:href="/recetas/+categoriar.nombretiporeceta">
                            <img v-bind:src="/imagestiporeceta/+categoriar.fototiporece" width="250" height="175"/></a>
                        </div>
                        <div class="card-body text-lg-center">
                            <a class="dropdown-item" v-bind:href="/recetas/+categoriar.nombretiporeceta">{{categoriar.nombretiporeceta}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data:function()
        {
            return {
                categoriasp:[],
                categoriasr:[],
            }
        },
        mounted() {
            this.loadcategoriap();
            this.loadcategoriar();
        },
        methods:{
            loadcategoriap:function(){
                axios.get('/ca98tewagao32ri74as14p')
                .then((response)=>{
                    this.categoriasp=response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
            },
            loadcategoriar:function(){
                axios.get('/c9789ate45641gorsdwiasr')
                .then((response)=>{
                    this.categoriasr=response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
            }
        }
    }
</script>