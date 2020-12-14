<template>
    <div class="container mt-5">
        
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
                    <li @click="activo='3'" :class="[activo==='3' ? 'active':'']"  class="nav-item nav-link">
                        Pedidos
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
                                <div v-if="activodir===`${index}`">
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
                        Agrega direcciones comprando en nuestro mercadillo online
                    </div>
                </div>
                <div v-if="activo==='3'">
                    <div v-if="loadPedidos.length>0">
                            <h3 class="textoh4 ">Mis Pedidos:</h3>
                        <ul class="nav nav-tabs">
                            <div v-for="(pedido,index) in loadPedidos" :key="index">
                                <li @click="[activodir=`${index}`]" :class="[activodir===`${index}` ? 'active':'']"  class=" nav-item nav-link">
                                    Pedido {{index+1}}
                                </li>
                            </div>
                        </ul>
                        <div  class="card-body3"> 
                            <div v-for="(pedido,index) in loadPedidos" :key="index">
                                <div v-if="activodir===`${index}`">
                                    <h4 class="textoh5 custom-control-inline">Fecha del pedido:</h4><h5 class="textoh5 custom-control-inline">{{pedido.fechapedido}}</h5>
                                    <br><h4 class="textoh5 custom-control-inline">Total a pagar:</h4><h5 class="textoh5 custom-control-inline"> {{pedido.totalpag}}</h5>
                                    <br><h4 class="textoh5 custom-control-inline">Estado del pedido:</h4><h5 class="textoh5 custom-control-inline">{{pedido.estado}}</h5>
                                    <br><br>
                                    <div v-if="verificar.cancelar" class="row justify-content-center">
                                        <form v-if="eliminarpedido" action="PUT" @submit.prevent="eliminar(index)">
                                            <button type="submit" class="btn1 btn-outline-danger">Eliminar pedido</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="text-center">
                        Animate a realizar pedidos en nuestro mercadillo online
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
                pedidoscliente:[],
                rutainformacion:'/clienteperfil',
                rutadirecciones:'/clientedirecciones',
                activo:'1',
                activodir:'0',
                tiempo:0,
                verificar:{
                    cancelar:true
                },
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
            },
            eliminar(index){
                axios.post('/apieliminar/'+this.pedidoscliente[index].idpedido)
                .then(response=>{
                    toastr.success("Pedido cancelado exitosamente");
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            activod(index){
                this.activodir=index+1;
                console.log(this.activodir)
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
            loadPedidos:function(){
                axios.get('/clientepedidos')
                .then((response)=>{
                    this.pedidoscliente=response.data.data;
                    this.tiempo=this.pedidoscliente[0].tiempo;
                })
                .catch(function(error){
                    console.log(error)
                });
                return this.pedidoscliente;
            },
            eliminarpedido(){
                console.log(this.verificar.cancelar);
                console.log(this.verificar.diferencia);
                console.log(this.verificar.tiempo);
                console.log(this.verificar.catual);
                axios.get('/apicancelar/'+this.tiempo)
                .then(response=>{
                    this.verificar=response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
                return this.verificar.cancelar;
            }
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