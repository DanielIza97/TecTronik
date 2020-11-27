<template>
    <div  class="container mt-4 m">
        <h2>CARRITO DE COMPRAS</h2>
        <div v-if="carrito.length>0" class="">
            <div class="row justify-content-center">
                <table class=" table table-success text-center">
                    <thead class="table-success ">
                        <tr >
                            <th colspan="2" >Producto</th>
                            <th > Detalle </th>
                            <th > Precio</th>
                            <th > Cantidad</th>
                            <th colspan="2" class="text-left"> Total</th>
                        </tr>
                    </thead>
                    <tbody >
                        <tr  v-for="(producto,index) in carrito" :key="index">
                            <td><img :src="`/imagesproducto/${producto.imagen}`" alt="" width="50"></td>
                            <td class="text-left">{{producto.nombre}}</td>
                            <td>{{producto.detalle}}</td>
                            <td ><i class="fa fa-dollar colorfuente"></i> {{producto.precio}}</td>
                            <td>
                                <button class=" btn fa fa-minus-circle text-lg-center" @click="resta(index,producto.cantidad)"  ></button>
                                    <div class="linea2" v-if="producto.medida=='M1'">
                                        <div>{{producto.cantidad}}</div>
                                    </div>
                                    <div class="linea2" v-else>
                                        <div>{{producto.cantidad}}</div>
                                    </div>
                                <button class=" btn fa fa-plus-circle" @click="suma(index,producto.cantidad)"></button>
                            </td>
                            <td class="text-left"><i class="fa fa-dollar colorfuente"></i> {{parseFloat(producto.cantidad*producto.precio).toFixed(2)}}</td>
                            <td class="">
                            <button  @click="eliminardelCarrito(index)"><i class="fa fa-trash colorfuente"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row ">
               <div class="card-header2  col-md-2 offset-md-8 text-center" >
                   <div class="linea close">Subtotal:</div><i class="fa fa-dollar colorfuente"></i> {{parseFloat(subtot).toFixed(2)}}
               </div>
            </div>
            <div class="row ">
               <a href="/" class="btn1 btn-outline-danger  my-4 close offset-md-4"><i class="fa fa-arrow-left"></i> Seguir Comprando</a>
               <div class="btn1 btn-outline-success my-4 close col-md-2 offset-md-3" data-toggle="modal" data-target="#modal1" >Generar Orden de compra</div>
            </div>
        </div>
        <div v-else> <h3 class="row justify-content-center my-5">Sin productos en el carrito </h3></div>
        <div class="modal fade" tabindex="-1" id="modal1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <Confirmar :sub="parseFloat(subtot).toFixed(2)"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import $ from 'jquery';
import Confirmar from './confirmar.vue';
export default {
    components:{
        Confirmar
    },
    data:function(){
        return{
            carrito:[],
            subtotal:0,
        }
    },
    mounted(){
        axios.get('/borrarcarrito/mostrar')
        .then((response)=>{
            this.carrito=response.data.data;
            this.carrito.forEach(element => {
                var cati=element.cantidad;
            });
        })
        .catch(function(error){
            console.log(error)
        });
        $(function(){
                $('#modal1').modal({
                    backdrop:'static',
                    keyboard:false,
                    focus:false,
                    show:false,
                    });
                });
    },
    methods:{
        
        eliminardelCarrito:function(index){
            this.carrito.splice(index,1);
            axios.post('/agregarcarrito/borrar',this.carrito)
            .then((response)=>{
                this.carrito=response.data.data;
            })
            .catch(function(error){
                console.log(error)
            });
        },
        suma:function(index,cantidad){
            if(this.carrito[index].medida=='M1')
                 this.carrito[index].cantidad=(cantidad++)+0.5;
            else
                this.carrito[index].cantidad=(cantidad++)+1;
            
            axios.post('/agregarcarrito/'+this.carrito[index].cantidad,this.carrito[index])
            .then((response)=>{
                this.carrito=response.data.data;
            })
            .catch(function(error){
                console.log(error)
            });
        },
        resta:function(index,cantidad){
            if(cantidad>0){
                if(this.carrito[index].medida=='M1')
                    this.carrito[index].cantidad=cantidad-0.5;
                else
                    this.carrito[index].cantidad=cantidad-1;
            }
            axios.post('/agregarcarrito/'+this.carrito[index].cantidad,this.carrito[index])
            .then((response)=>{
                this.carrito=response.data.data;
            })
            .catch(function(error){
                console.log(error)
            });
        },
    },
    computed:{
        subtot:function(){
            this.subtotal=0;
            if(this.carrito.length>0)
            {
            this.carrito.forEach(element => {
                    var cati=element.cantidad*element.precio;
                    this.subtotal=this.subtotal+(cati++);
                });
            }
            return this.subtotal;
        }
    },
    
}
</script>

<style>
.inputs{
    widows: 10px;
}
</style>
