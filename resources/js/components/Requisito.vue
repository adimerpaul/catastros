<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">REQUISITOS</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" @click="crear" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar">
                           <i class="fa fa-plus"></i> Nuevo tramite
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-success text-white">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Nuevo Tramite</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="guardar">
                                            <div class="form">
                                                <div class="field-wrapper input">
                                                    <label for="nom">Nombre Tramite</label>                                                    
                                                    <input type="text" class="form-control" id="nom" v-model="requisito.nombre">
                                                </div>
                                                <div class="field-wrapper input">
                                                    <label for="det">Detalle del tramite</label>
                                                    <input type="text" class="form-control" id="det" v-model="requisito.detalle">
                                                </div>

                                                <div class="form-group">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <td>N</td>
                                                            <td>Documento</td>
                                                            <td>Opciones</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr v-for="(i,index) in requisito.detalles" :key="index">
                                                            <th scope="row">{{index+1}}</th>
                                                            <td><input type="text" class="form-control" :name="i.nombre" v-model="i.nombre"></td>
                                                            <td>
                                                                <div @click="mas"  class="btn btn-success btn-sm"><i class="fa fa-plus"></i></div>
                                                                <div @click="menos(index)" v-if="index!=0" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash"></i> Cerrar</button>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guargar Datos</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Modificar Tramite</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="update">
<div class="form">
                                                <div class="field-wrapper input">
                                                    <label for="nom">Nombre Tramite</label>                                                    
                                                    <input type="text" class="form-control" id="nom" v-model="requisito.nombre">
                                                </div>
                                                <div class="field-wrapper input">
                                                    <label for="det">Detalle del tramite</label>
                                                    <input type="text" class="form-control" id="det" v-model="requisito.detalle">
                                                </div>

                                                <div class="form-group">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <td>N</td>
                                                            <td>Documento</td>
                                                            <td>Opciones</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr v-for="(i,index) in requisito.detalles" :key="index">
                                                            <th scope="row">{{index+1}}</th>
                                                            <td><input type="text" class="form-control" :name="i.nombre" v-model="i.nombre"></td>
                                                            <td>
                                                                <div @click="mas"  class="btn btn-success btn-sm"><i class="fa fa-plus"></i></div>
                                                                <div @click="menos(index)" v-if="index!=0" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash"></i> Cerrar</button>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guargar Datos</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Detalles</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(i,index) in requisitos" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{i.nombre}}</td>
                                    <td>{{i.detalles}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" @click="actualizar(i)"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-sm" @click="eliminar(i.id)"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    const axios=require('axios');
    export default {
        data(){
            return {
                requisito:{detalles:[{nombre:''}]},
                                //dato:{hijos:[{nombres:'',apellidos:''}]},
                requisitos:[]
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.datos();
            //crear(){
            //    this.requisito={};
            //}
        },
        methods:{
            mas(){
                this.requisito.detalles.push({nombres:'',apellidos:''});
            },
            menos(index){
                this.requisito.detalles.splice(index, 1);
            },
            guardar(){
                axios.post('/requisito',this.requisito).then(res=>{
                    $('#registrar').modal('hide');
                    this.datos();
                    this.requisito={};
                })
            },
            datos(){
                axios.get('/requisito').then(res=>{
                    this.requisitos=res.data;
                })
            },
            eliminar(id){
                if(confirm('Seguro desea eliminar?')){
                    axios.delete('/requisito/'+id).then(res=>{
                        this.datos();
                    });
                }
            },
            actualizar(i){
                this.requisito=i;
                $('#modificar').modal('show');
            },
            update(){
                axios.put('/requisito/'+this.requisito.id, this.requisito).then(res=>{
                    $('#modificar').modal('hide');
                    this.datos();
                    this.requisito={};
                })
            },
            crear(){
                this.requisito={detalles:[{nombre:''}]};
            }
        }
    }
</script>
