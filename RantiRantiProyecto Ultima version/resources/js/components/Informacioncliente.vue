<template>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body1">
                        <h3 style="text-align:center">Mi información</h3>
                        <h4 style="text-align:center">  Mira tu información personal a continuación</h4>
                        <h4>Cedula: </h4><h5>{{informacioncliente.cedula}}</h5>
                        <h4>Nombre del cliente:</h4><h5 > {{informacioncliente.nombre}}</h5>
                        <h4>Sexo:</h4><h5>{{informacioncliente.genero}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body1" v-for="direccion in direccionescliente" :key="direccion.id">
                        <h3>Mis direcciones:</h3>
                        <h4>Mira tus direcciones almacenadas:</h4>
                        <h4>Calle Principal:</h4><h5>{{direccion.principal}}</h5>
                        <h4>Calle Secundaria:</h4><h5> {{direccion.secundaria}}</h5>
                        <h4>No. de Casa:</h4><h5>{{direccion.numero}}</h5>
                        <h4>Imagen de Casa:</h4><img v-bind:src="/imagesdireccion/+direccion.imagen" width="75"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['id','cedula'],
        data:function()
        {
            return {
                informacioncliente:[],
                direccionescliente:[],
                rutainformacion:'/clienteperfil',
                rutadirecciones:'/clientedirecciones',
            }
        },
        mounted() {
            this.loadDirecciones();
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
            loadDirecciones:function(){
                axios.get(this.rutadirecciones)
                .then((response)=>{
                    this.direccionescliente=response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
            }
        }
    }
</script>