<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Mi informacion</h3>
                        <h4>Mira tu informacion persona a continuación</h4>
                            <h5>Cedula </h5><h5>{{informacioncliente.cedula}}</h5>
                            <h5>Nombre del cliente</h5><h5> {{informacioncliente.nombre}}</h5>
                            <h5>Telefono</h5><h5> {{informacioncliente.telefono}}</h5>
                            <h5>Genero</h5><h5>{{informacioncliente.genero}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['identificador'],
        data:function()
        {
            return {
                informacioncliente:'',
                ruta:'/clienteperfil/'+this.identificador,
            }
        },
        mounted() {
            this.loadInformacion();
            console.log('hola');
        },
        methods:{
            loadInformacion:function(){
                axios.get(this.ruta)
                .then((response)=>{
                    this.informacioncliente=response.data.data;
                })
                .catch(function(error){
                    console.log(error)
                });
            }
        }
    }
</script>
