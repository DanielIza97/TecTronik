<template>
    <div class="">
    </div>
</template>
<script>
export default {
    props:[
        'usuario'
    ],
    data:function(){
        return{
            mensaje:'',
            imagen:'',
        }
    },
    created(){
        },
    mounted(){
        this.escucharnotificacion();
    },
    methods:{
        escucharnotificacion(){
            if(Notification.permission !=="granted")
                Notification.requestPermission();
            else
            {
                Echo.channel('ranti-ranti.'+this.usuario)
                .listen('OrderStatusChangedEvent', (pedido) => {
                    console.log(pedido.pedido.estado);
                    if(pedido.pedido.estado=='entregado')
                    {
                        this.mensaje='Su producto ha sido entregado exitosamente';
                        this.imagen="../images/logo.png"
                    }
                    else
                    {
                        this.mensaje='Su pedido será entregado en 25 minutos';
                        this.imagen="../images/entregando.png"
                    }
                    if (! (Notification)) {
                        alert('Web Notification is not supported');
                    return;
                    }
                    if(Notification.permission !=="granted")
                        Notification.requestPermission();
                    else
                    {
                        let notification = new Notification('Pedido:'+pedido.pedido.idpedido, {
                            body: this.mensaje, // content for the alert
                            icon: this.imagen, // optional image url
                        });
                    }
                })
            }
        }
    }
}
</script> 
<style>

</style>