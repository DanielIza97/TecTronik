<template>
    <div>
        
        <div class="modal-header bg-white">
          <div class="modal-title navbar-brand ">Confirmar orden</div>
            <button class="close btn1 btn-outline-success" data-dismiss="modal" data-target="#modal1" >X</button>
        </div>
        <div class="modal-body">
            <div class="container">
                <transition name="tap" >
                    <div v-if="tap">
                        <div class="row justify-content-center">
                            <table class=" table table-success">
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
                            <input type="submit" @click="activodireccion=true; tap=false;izder=true" class="btn1 btn-outline-success close offset-md-3" value="Sigiente" >
                        </div>
                    </div>
                </transition>
                <transition :name="transi">
                    <div v-if="activodireccion">
                        <input v-on:click="borrar" type="radio" id="uno" value="nuevo" v-model="direcc">
                        <label for="uno">Ingresar nueva direccion</label>
                        <input type="radio" id="Dos" value="viejo" v-model="direcc">
                        <label for="Dos">Elegir direccion</label>
                        <div v-if="direcc==='nuevo'">
                            <h4 class="mb-4">Ingrese la direccion a enviar</h4>
                        </div>
                        <div v-else>
                            <h4 class="mb-4">Elija la direccion de su domicilio</h4>
                            <div class="row justify-content-center">
                                <select @click="asignar(selected)" v-model="selected" class="select">
                                    <option disabled value="" selected>Seleccione una direccion</option>
                                    <option :label="'Direccion '+((index++)+1)" v-for="(d,index) in direcciones" :key="index">{{index-1}}</option>
                                </select>
                            </div>
                        </div>
                        <form method="post" @submit.prevent="agregardireccion" enctype="multipart/form-data" >
                            <div class="form-group row">
                                <label for ="provincia" class="col-sm-12 col-form-label text-left">Provincia</label>
                                <div class="col-sm-12">
                                    <input type="text" name="provincia" id="provincia" :class="status($v.direccion.provincia)" v-model="$v.direccion.provincia.$model" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="ciudad" class="col-sm-12 col-form-label text-left">Ciudad</label>
                                <div class="col-sm-12">
                                    <input type="text" name="ciudad" id="ciudad" :class="status($v.direccion.ciudad)" v-model="$v.direccion.ciudad.$model"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="sector" class="col-sm-12 col-form-label text-left">Sector</label>
                                <div class="col-sm-12">
                                    <input type="text" name="sector" id="sector" :class="status($v.direccion.sector)" v-model="$v.direccion.sector.$model"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="calleprincipal" class="col-sm-12 col-form-label text-left">Calle principal</label>
                                <div class="col-sm-12">
                                    <input type="text" name="calleprincipal" id="calleprincipal" :class="status($v.direccion.calleprincipal)" v-model="$v.direccion.calleprincipal.$model"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="callesecundaria" class="col-sm-12 col-form-label text-left">Calle secundaria</label>
                                <div class="col-sm-12">
                                    <input type="text" name="callesecundaria" id="callesecundaria" :class="status($v.direccion.callesecundaria)" v-model="$v.direccion.callesecundaria.$model"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="numerodecasa" class="col-sm-12 col-form-label text-left">Numero de casa</label>
                                <div class="col-sm-12">
                                    <input type="text" name="numerodecasa" id="numerodecasa" :class="status($v.direccion.numerodecasa)" v-model="$v.direccion.numerodecasa.$model"  class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for ="imagendireccion" class="col-sm-2 col-form-label text-left">Imagen de referencia</label>
                                <div class="col-sm-2 offset-md-3">
                                    <div class="div_file form-control ">
                                        <input @change="asignarruta($event)" type="file" name="imagendireccion" id="imagendireccion"  class="btn btn-block btn-add div_button" accept="image/*" >
                                    </div>
                                </div>
                                    <label for ="imagendireccion" class="col-sm-2 col-form-label text-left">{{imagen}}</label>
                            </div>
                            <div class="row justify-content-end">
                                <input type="submit" class="btn1 btn-outline-success close offset-md-3" value="Siguiente" >
                            </div>
                        </form>
                        <div class="puesto">
                            <input type="submit" @click="activodireccion=false; tap=true" class="btn1 btn-outline-warning close " value="Atras" >
                        </div>
                    </div>
                </transition>
                <transition name="celular">
                    <div v-if="activocel" class="puesto1">
                        <h4 class="mb-4">Ingrese su numero celular para informar la llegada de los productos</h4>
                        <form  method="post" @submit.prevent="prevenir" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for ="celular" class="col-sm-12 col-form-label text-left">Número celular</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="celular" id="celular" :class="status($v.direccion.telefonocliente)" v-model="$v.direccion.telefonocliente.$model" class="form-control">
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <input v-if="!$v.direccion.telefonocliente.$invalid" type="submit" data-toggle="modal" data-target="#modal2" class="btn1 btn-outline-success close offset-md-3" value="Confirmar orden de compra" >
                                </div>
                        </form>
                        <div :class="puest($v.direccion.telefonocliente)">
                            <input type="submit" @click="activodireccion=true; activocel=false;izder=false" class="btn1 btn-outline-warning close " value="Atras" >
                        </div>
                    </div>
                </transition>
                <div class="modal fade" id="modal2" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered justify-content-center">
                        <div class="modal-content">
                            <div class="modal-header bg-white">
                                <div class="modal-title navbar-brand ">Confirmar</div>
                            </div>
                            <div class="modal-body close">
                            Confirme su pedido por favor
                            </div>
                            <div class="modal-footer row justify-content-center">
                                <button type="button" class="btn1 btn-outline-danger close offset-md-3" data-dismiss="modal" aria-label="Close">Cancelar</button>
                                <button type="button"  @click="confirmar"><a href="#"  class="btn1 btn-outline-success close offset-md-3">Aceptar</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import $ from 'jquery';
import { METHODS } from 'http'
import {required, minLength, maxLength } from 'vuelidate/lib/validators'
const ceroynueve = (value)=>value.substring(0,2)=='09';
export default {
    props:['sub'],
    data(){
        return{
            selected:'',direcciones:[],direcc:'nuevo',imagen:'',
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
            activodireccion:false,activocel:false,respuesta:[],direc:'viejo',
            i:0,tap:0,subtot:0,tap:true,izder:true,transicion:'entar1',
            confirmado:false,
        }
    },
    validations:{
        direccion:{
            provincia:{
                required
            },
            ciudad:{
                required
            },
            sector:{
                required
            },
            calleprincipal:{
                required
            },
            callesecundaria:{
                required
            },
            numerodecasa:{
                required
            },
            telefonocliente:{
                ceroynueve,
                minLength:minLength(10),
                maxLength:maxLength(10),
            }
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
       $(function(){
            $('#modal2').modal({
                backdrop:'static',
                keyboard:false,
                focus:false,
                show:false,
                });
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
        status(validacion) {
            return {
                incorrecto: validacion.$error,
                correcto: !validacion.$invalid,
            }
        },
        agregardireccion(){
            this.subtot=this.sub;
            this.i=parseFloat(this.sub*0.12).toFixed(2);
            this.direccion.iva=(this.i++);
            this.direccion.subtotal=(this.subtot++);
            this.tap=parseFloat(this.direccion.iva+this.direccion.subtotal).toFixed(2);
            this.direccion.totalpag=(this.tap++);
            this.direccion.iddireccion=this.direcciones.length+1;
            if(!(this.$v.direccion.provincia.$invalid || this.$v.direccion.ciudad.$invalid ||
                this.$v.direccion.sector.$invalid || this.$v.direccion.calleprincipal.$invalid ||
                this.$v.direccion.callesecundaria.$invalid || this.$v.direccion.numerodecasa.$invalid))
            {
            this.activodireccion=false;
            this.activocel=true;
            }
            else{
                toastr.error("Los campos de la direccion son obligatorios")
            }
            this.tap=false;
        },
        prevenir:  function(){
             if(this.$v.direccion.telefonocliente.$invalid)
                return false;
        },
        confirmar(){
            console.log(this.direccion)
            axios.post('/apiconfirmar',this.direccion)
            .then((response)=>{
            })
            .catch(function(error){
                console.log(error)
            });
            axios.post('/api/enviarsms',this.direccion)
            .then((response)=>{
                if (! (Notification)) {
                    alert('Web Notification is not supported');
                    return;
                    }
                    if(Notification.permission !=="granted")
                        Notification.requestPermission();
                    else
                    {
                        let notification = new Notification('Pedido generado correctamente', {
                            data:'En breve le llegara un sms',
                            icon: "../images/correcto.png" // optional image url
                        });
                    }
            })
            .catch(function(error){
                console.log(error)
            });
            $(function(){
                $('#modal1').modal('hide');
                $('#modal2').modal('hide');
            });
        },
        asignarruta(e){
            this.imagen=e.target.files[0].name;
            this.direccion.imagendireccion=this.imagen;
        },
        asignar(index){
            if(!index=='')
                this.direccion=this.direcciones[parseInt(index)];
        },
        borrar(){
            this.direccion={
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
            }
            console.log(this.direccion);
        },
        puest(validacion){
            return {
                puesto:!validacion.$invalid
            }
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
    margin-top: -2.6rem;
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

.correcto, .correcto:focus{
    border-color: #0ed145;
    padding-right: calc(1.6em + 0.75rem);
    background-image: url('~/images/correcto.png');
    background-repeat: no-repeat;
    background-position: right calc(0.4em + 0.1875rem) center;
    background-size: calc(0.8em + 0.375rem) calc(0.8em + 0.375rem);
    outline-color: #0ed145;
}
.incorrecto, .incorrecto:focus{
    border-color: #e3342f;
    padding-right: calc(1.6em + 0.75rem);
    background-image: url('~/images/incorrecto.png');
    background-repeat: no-repeat;
    background-position: right calc(0.4em + 0.1875rem) center;
    background-size: calc(0.8em + 0.375rem) calc(0.8em + 0.375rem);
    outline-color: #e3342f;
}
</style>