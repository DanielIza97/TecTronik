<template>
    <div class="container">
        
        <div class="row ">
            <div class="row col justify-content-center">
                <div class="m5 m">
                    <div class="card-body4" :style="`background-image:url('/imagesusers/${iniciosesion.fotouser}')`"></div>
                    <h2>{{iniciosesion.email}}</h2>
                </div>
            </div>
            <div class="col justify-content-end">
            <div class="card m5 m">
                <ul class="nav nav-tabs ">
                    <li @click="activo='1'" :class="[activo==='1' ? 'active':'']" class="nav-item nav-link">
                        Informacion
                    </li>
                    <li @click="activo='2'" :class="[activo==='2' ? 'active':'']"  class="nav-item nav-link">
                        Direcciones
                    </li>
                </ul>
                <div class="card-body3 " v-if="activo==='1'">
                    <h3 class="textoh4 ">Mi información</h3>
                    <h4 class="textoh4">  Mira tu información personal a continuación</h4>
                    <h4 class="textoh5 custom-control-inline">Cedula: </h4><h5 class="textoh5 custom-control-inline">{{informacioncliente.cedula}}</h5>
                    <br><h4 class="textoh5 custom-control-inline">Nombre del cliente:</h4><h5 class="textoh5 custom-control-inline"> {{informacioncliente.nombre}}</h5>
                    <br><h4 class="textoh5 custom-control-inline">Sexo:</h4><h5 class="textoh5 custom-control-inline">{{informacioncliente.genero}}</h5>
                </div>
                <div v-if="activo==='2'">
                    <div v-if="loadDirecciones.length>0">
                            <h3 class="textoh4 ">Mis direcciones:</h3>
                        <ul class="nav nav-tabs">
                            <div v-for="(direccion,index) in loadDirecciones" :key="index">
                                <li @click="activodir=`${index}`" :class="[activodir===`${index}` ? 'active':'']"  class=" nav-item nav-link">
                                    Direccion {{index+1}}
                                </li>
                            </div>
                        </ul>
                        <div  class="card-body3"> 
                            <div v-for="(direccion,index) in loadDirecciones" :key="index">
                                <div v-if="activodir===`${index}` && direccion.estado===true">
                                    <h4 class="textoh5 custom-control-inline">Calle Principal:</h4><h5 class="textoh5 custom-control-inline">{{direccion.calleprincipal}}</h5>
                                    <br><h4 class="textoh5 custom-control-inline">Calle Secundaria:</h4><h5 class="textoh5 custom-control-inline"> {{direccion.callesecundaria}}</h5>
                                    <br><h4 class="textoh5 custom-control-inline">No. de Casa:</h4><h5 class="textoh5 custom-control-inline">{{direccion.numerodecasa}}</h5>
                                    <br><h4 class="textoh5 custom-control-inline"> Imagen de Casa:</h4><img v-bind:src="/imagesdireccion/+direccion.imagendireccion" width="75"/>
                                    <br><br><div class="row justify-content-center">
                                        <form action="PUT" @submit.prevent="borrar(index)">
                                            <button type="submit" class="btn1 btn-outline-danger">Eliminar dirección</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="text-center">
                        Agrega direcciones comprando en nuestra tienda online
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['id','cedula','iniciosesion'],
        data:function()
        {
            return {
                informacioncliente:[],
                direccionescliente:[],
                rutainformacion:'/clienteperfil',
                rutadirecciones:'/clientedirecciones',
                activo:'1',
                activodir:'0'
            }
        },
        mounted() {
            this.loadInformacion();
        },
        methods:{
            loadInformacion:function(){
                axios.get(this.rutainformacion)
                .then((response)=>{
                    this.informacioncliente=response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
            },
            borrar(index){
                axios.post('/apiborrar/'+this.direccionescliente[index].iddireccion)
                .then(response=>{
                    toastr.success("Dirección eliminada correctamente");
                })
                .catch(function(error){
                    console.log(error);
                })
            }
        },
        computed:{
            loadDirecciones:function(){
                axios.get(this.rutadirecciones)
                .then((response)=>{
                    this.direccionescliente=response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
                return this.direccionescliente;
            },
        }
    }
</script>
<style>
.card-body4{
    flex: 1 1 auto;
    height: 150px;
    border-radius: 50%;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
}
</style>