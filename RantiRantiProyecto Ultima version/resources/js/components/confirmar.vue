<template>
    <div>
        
        <div class="modal-header bg-white">
          <div class="modal-title navbar-brand ">Confirmar orden</div>
            <button class="close btn1 btn-success" data-dismiss="modal" data-target="#modal1" >X</button>
        </div>
        <div class="modal-body">
            <div class="container">
                <transition name="tap" >
                    <div v-if="tap">
                        <div class="row justify-content-center">
                            <table class=" table table-success table-hover">
                                <tbody>
                                    <tr>
                                        <th class="text-center">Subtotal:</th>
                                        <th class="text-left">{{sub}}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Iva 12%:</th>
                                        <th class="text-left">{{(sub*0.12).toFixed(2)}}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Total a pagar:</th>
                                        <th class="text-left">{{(parseFloat(sub*0.12)+parseFloat(sub)).toFixed(2)}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-end">
                            <input type="submit" @click="activodireccion=true; tap=false;izder=true" class="btn btn-add" value="Sigiente" >
                        </div>
                    </div>
                </transition>
                <transition :name="transi">
                    <div v-if="activodireccion">
                        <input v-on:click="borrar" type="radio" id="uno" value="nuevo" v-model="direcc">
                        <label for="uno">Ingresar nueva direccion</label>
                        <input type="radio" id="Dos" value="viejo" v-model="direcc">
                        <label for="Dos">Elegir direccion</label>
                        {{direcc}}
                        <div v-if="direcc==='nuevo'">
                            <h4 class="mb-4">Ingrese la direccion a enviar</h4>
                        </div>
                        <div v-else>
                            <h4 class="mb-4">Elija la direccion de su domicilio</h4>
                            <div class="row justify-content-center">
                                <select @click="asignar(selected)" v-model="selected" class="select">
                                    <option disabled value="">Seleccione una direccion</option>
                                    <option :label="'Direccion '+((index++)+1)" v-for="(d,index) in direcciones" :key="index">{{index-1}}</option>
                                </select>
                            </div>
                        </div>
                        <form  method="post" @submit.prevent="agregardireccion" enctype="multipart/form-data" >
                            <div class="form-group row">
                                <label for ="provincia" class="col-sm-2 col-form-label text-left">Provincia</label>
                                <div class="col-sm-10">
                                    <input type="text" name="provincia" id="provincia" v-model="direccion.provincia" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="ciudad" class="col-sm-2 col-form-label text-left">Ciudad</label>
                                <div class="col-sm-10">
                                    <input type="text" name="ciudad" id="ciudad" v-model="direccion.ciudad"  class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="sector" class="col-sm-2 col-form-label text-left">Sector</label>
                                <div class="col-sm-10">
                                    <input type="text" name="sector" id="sector" v-model="direccion.sector"  class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="calleprincipal" class="col-sm-2 col-form-label text-left">Calle principal</label>
                                <div class="col-sm-10">
                                    <input type="text" name="calleprincipal" id="calleprincipal" v-model="direccion.calleprincipal"  class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="callesecundaria" class="col-sm-2 col-form-label text-left">Calle secundaria</label>
                                <div class="col-sm-10">
                                    <input type="text" name="callesecundaria" id="callesecundaria" v-model="direccion.callesecundaria"  class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="numerodecasa" class="col-sm-2 col-form-label text-left">Numero de casa</label>
                                <div class="col-sm-10">
                                    <input type="text" name="numerodecasa" id="numerodecasa" v-model="direccion.numerodecasa"  class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="imagendireccion" class="col-sm-2 col-form-label text-left">Imagen de referencia</label>
                                <div class="col-sm-3 offset-md-3">
                                    <div class="div_file form-control ">
                                        <input @change="asignarruta($event)" type="file" name="imagendireccion" id="imagendireccion"  class="btn btn-block btn-add div_button" accept="image/*" >
                                    </div>
                                </div>
                                    <label for ="imagendireccion" class="col-sm-2 col-form-label text-left">{{imagen}}</label>
                            </div>
                            <div class="row justify-content-end">
                                <input type="submit" class="btn btn-add" value="Siguiente" >
                            </div>
                        </form>
                        <div class="puesto">
                            <input type="submit" @click="activodireccion=false; tap=true" class="btn btn-add" value="Atras" >
                        </div>
                    </div>
                </transition>
                <transition name="celular">
                    <div v-if="activocel" class="puesto1">
                        <h4 class="mb-4">Ingrese su numero celular para informar la llegada de los productos</h4>
                        <form  method="post" @submit.prevent="prevenir" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for ="celular" class="col-sm-2 col-form-label text-left">Número celular</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="celular" id="celular" v-model="direccion.telefonocliente" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <input type="submit" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-add" value="Confirmar orden de compra" >
                                </div>
                        </form>
                        <div class="puesto">
                            <input type="submit" @click="activodireccion=true; activocel=false;izder=false" class="btn btn-add" value="Atras" >
                        </div>
                    </div>
                </transition>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Confirmar Pedido</h5>
                            <button type="button" class="close" data-dismiss="modal" data-target="#exampleModalCenter" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                           Está Seguro de Confirmar Pedido?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter" >Cancelar</button>
                            <button type="button" @click="confirmar" data-dismiss="modal"  class="btn btn-success">Aceptar</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        </div>
    </div>
</template>
<script>
import { METHODS } from 'http'
export default {
    props:['sub'],
    data(){
        return{
            selected:'',
            direcciones:[],
            direcc:'nuevo',
            imagen:'',
            direccion:{
                imagendireccion:null,
                subtotal:0,
                iva:0,
                totalpag:0,
                provincia:'',
                ciudad:'',
                sector:'',
                calleprincipal:'',
                callesecundaria:'',
                numerodecasa:'',
                telefonocliente:'',
            },
            activodireccion:false,
            activocel:false,
            respuesta:[],
            direc:'viejo',
            i:0,
            tap:0,
            subtot:0,
            tap:true,
            izder:true,
            transicion:'entar1',
            html:'<div>hola<div>',
            confirmado:false,
        }
    },
    mounted(){
        axios.get('/clientedirecciones')
        .then((response)=>{
            this.direcciones=response.data.data;
        })
        .catch(function(error){
            console.log(error)
        });
    },
    computed:{
        transi(){
        if(!this.izder)
            this.transicion='entar';
        else
            this.transicion='entar1';
        return this.transicion;
        
        },
        
    },
    methods:{
        agregardireccion(){
            this.subtot=this.sub;
            this.i=parseFloat(this.sub*0.12).toFixed(2);
            this.direccion.iva=(this.i++);
            this.direccion.subtotal=(this.subtot++);
            this.tap=parseFloat(this.direccion.iva+this.direccion.subtotal).toFixed(2);
            this.direccion.totalpag=(this.tap++);
            this.activodireccion=false;
            this.activocel=true;
            this.tap=false;
        },
        prevenir:  function(){
        },
        confirmar(){
            axios.post('/apiconfirmar/'+this.direc,this.direccion)
            .then((response)=>{
                //this.respuesta=response.data.data;
            })
            .catch(function(error){
                console.log(error)
            });
            console.log(this.direccion);
        },
        asignarruta(e){
            this.imagen=e.target.files[0].name;
            this.direccion.imagendireccion='/imagesdireccion/'+this.imagen;
        },
        asignar(index){
            if(!index=='')
                this.direccion=this.direcciones[parseInt(index)];
        },
        borrar(){
            this.direccion.iddireccion=this.direcciones.length+1;
            if(this.direcc=='viejo'){
                    this.direccion={};
            };
        }
    }
}
</script>
<style>
.entar-enter-active {
  transition: all .05s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.entar-enter{
    transform: translateX(-100%);
} 
.entar1-enter-active {
  transition: all .05s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.entar1-enter{
    transform: translateX(100%);
} 
.celular-enter-active {
  transition: all .05s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.celular-enter{
    transform: translateX(100%);
} 
.tap-enter-active {
  transition: all .05s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.tap-enter{
    transform: translateX(-100%);
} 
.div_file{
    background-image: url("~/images/Agregar.png");
    background-repeat: no-repeat;
    background-size: contain;
    background-position: top;
    position: relative;
    border: none;
    height: 100%;
}
.div_button{
    position: absolute;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    width: 100%;
    height: 100%;
    font-size: 1px;
    opacity: 0;
    color: #000;
}
.puesto{
    margin-top: -2.2rem;
}
.select{
    border-radius: 5px;
    padding: 10px 50px 10px 10px;
    margin-bottom: 2%;
    -webkit-appearance: none;
    appearance: none;
    -moz-appearance: none;
    border: 1px solid #ced4da;
    background-image: url(/images/flecha.png);
    background-size: 7%;
    background-repeat: no-repeat;
    background-position: right 5% top 50%;
    color: #006ca8;
}
.select:focus{
    color: #006ca8;
    background-color: #fff;
    border-color: #a1cbef;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
    border-radius: 10px;
}
</style>