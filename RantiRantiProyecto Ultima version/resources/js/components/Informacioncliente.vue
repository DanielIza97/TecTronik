<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Mi informacion</h3>
                        <h4>Mira tu informacion personal a continuación</h4>
                        <h5>Cedula </h5><h5>{{informacioncliente.cedula}}</h5>
                        <h5>Nombre del cliente</h5><h5> {{informacioncliente.nombre}}</h5>
                        <h5>Telefono</h5><h5> {{informacioncliente.telefono}}</h5>
                        <h5>Genero</h5><h5>{{informacioncliente.genero}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body" v-for="direccion in direccionescliente" :key="direccion.id">
                        <h3>Mis direcciones</h3>
                        <h4>Mira tus direcciones almacenadas</h4>
                        <h5>Calle Principal</h5><h5>{{direccion.principal}}</h5>
                        <h5>Calle Secundaria</h5><h5> {{direccion.secundaria}}</h5>
                        <h5>No. de Casa</h5><h5>{{direccion.numero}}</h5>
                        <h5>Imagen de Casa</h5><img v-bind:src="/imagesdireccion/+direccion.imagen" width="75"/>
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
                rutainformacion:'/clienteperfil/'+this.cedula,
                rutadirecciones:'/clientedirecciones/'+this.cedula,
            }
        },
        mounted() {
            this.loadInformacion();
            this.loadDirecciones();
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
