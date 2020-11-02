<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                            <h4>Cedula: {{informacioncliente.cedula}}</h4><h4>Nombre del cliente: {{informacioncliente.nombre}}</h4>
                            <h4>Telefono: {{informacioncliente.telefono}}</h4>
                            <h4>Genero: {{informacioncliente.genero}}</h4>
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
