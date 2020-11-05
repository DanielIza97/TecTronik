<template>
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupported" aria-controls="navbarSupportedContent" aria-expanded="false" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupported">
            <div id="block-navegacionprincipal">
                
                <ul class="menu-menu">
                    <li><p class="dropdown-toggle">Productos</p>
                        <ul>
                            <div >
                                <li v-for="categoriap in categoriasp" :key="categoriap.id"><a class="dropdown-item" v-bind:href="/recetas/+categoriap.nombre">{{categoriap.nombre}}</a></li>
                            </div>
                        </ul>
                    </li>
                    <li><p class="dropdown-toggle">Recetas</p>
                        <ul >
                            <li v-for="categoriar in categoriasr" :key="categoriar.idtiporeceta">
                                <a class="dropdown-item" v-bind:href="/recetas/+categoriar.nombretiporeceta">{{categoriar.nombretiporeceta}}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
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