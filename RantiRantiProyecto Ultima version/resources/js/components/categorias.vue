<template>
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
                <div class="carousel-item">
                    <div  :style="'background-image:url(/images/callage2.png);'" class="d-block w-100 slides"></div>
                </div>
                <div class="carousel-item ">
                    <div  :style="'background-image:url(/images/collage.png);'" class="d-block w-100 slides"></div>
                </div>
                <div class="carousel-item active">
                    <div  :style="'background-image:url(/images/collage3.png);'" class="d-block w-100 slides"></div>
                </div>
            </div>
        </div>
        <h3 class="container text-left mt-4">Productos</h3>
        <div class="offset-md-1 row justify-content-center mb-4 mt-4">
            <div v-for="categoriap in categoriasp" :key="categoriap.id">
                <div class="card1 ">
                    <a v-bind:href="/productos/+categoriap.nombre">
                    <img :src="/imagestipoprod/+categoriap.foto" class="card card-img-top align-self-center custom-control-inline" :alt="'Sin foto'">
                    <div class="card-body1 dropdown-item mt-5">{{categoriap.nombre}}</div>
                    </a>
                </div>
            </div>
        </div>
        <h3 class="container text-left mt-4">Recetas</h3>
        <div class="offset-md-1 row justify-content-center mt-4 m">
            <div v-for="categoriar in categoriasr" :key="categoriar.idtiporeceta">
                <div class="card1 ">
                    <a v-bind:href="/recetas/+categoriar.nombretiporeceta">
                    <img :src="/imagestiporeceta/+categoriar.fototiporece" class="card card-img-top align-self-center custom-control-inline" :alt="'Sin foto'">
                    <div class="card-body1 dropdown-item mt-5">{{categoriar.nombretiporeceta}}</div>
                    </a>
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
                items:[
                    {src:'/images/collage.png'},
                    {src:'/images/callage2.png'},
                    {src:'/images/collage3.png'},
                ],
                index:3,
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
            },
        },
    }
</script>
<style>
.slides{
    display: flex;
    width: 100%;
    height: 500px;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: bottom;
    overflow: hidden;
}
</style>