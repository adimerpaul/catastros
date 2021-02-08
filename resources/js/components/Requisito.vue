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
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Registro de Persona</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="guardar">                                            
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.nombre" class="form-control" id="nombre" placeholder="Nombre">
                                                </div>
                                                <label for="apellidos" class="col-sm-3 col-form-label">Apellidos</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.apellidos" class="form-control" id="apellidos" placeholder="Apellidos">
                                                </div>
                                                <label for="ci" class="col-sm-3 col-form-label">CI</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.ci" class="form-control" id="ci" placeholder="CI">
                                                </div>
                                                <label for="celular" class="col-sm-3 col-form-label">Celular</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.celular" class="form-control" id="celular" placeholder="Celular">
                                                </div>
                                                <label for="direccion" class="col-sm-3 col-form-label">Direccion</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.direccion" class="form-control" id="direccion" placeholder="Direccion">
                                                </div>
                                                <label for="objetivo" class="col-sm-3 col-form-label">Objetivo</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.objetivo" class="form-control" id="objetivo" placeholder="Objetivo">
                                                </div>
                                                <label for="codDetalle" class="col-sm-3 col-form-label">Cod Detalle</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.codDetalle" class="form-control" id="codDetalle" placeholder="Codigo Detalle">
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
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.nombre" class="form-control" id="nombre">
                                                </div>
                                                <label for="apellidos" class="col-sm-3 col-form-label">Apellidos</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.apellidos" class="form-control" id="apellidos">
                                                </div>
                                                <label for="ci" class="col-sm-3 col-form-label">CI</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.ci" class="form-control" id="ci">
                                                </div>
                                                <label for="celular" class="col-sm-3 col-form-label">Celular</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.celular" class="form-control" id="celular">
                                                </div>
                                                <label for="direccion" class="col-sm-3 col-form-label">Direccion</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.direccion" class="form-control" id="direccion">
                                                </div>
                                                <label for="objetivo" class="col-sm-3 col-form-label">Objetivo</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.objetivo" class="form-control" id="objetivo">
                                                </div>
                                                <label for="codDetalle" class="col-sm-3 col-form-label">Cod Detalle</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.codDetalle" class="form-control" id="codDetalle">
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
                                    <th>Apellidos</th>
                                    <th>CI</th>
                                    <th>Celular</th>
                                    <th>Direccion</th>
                                    <th>Objetivo</th>
                                    <th>CodDetalle</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(i,index) in requisitos" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{i.nombre}}</td>
                                    <td>{{i.apellidos}}</td>
                                    <td>{{i.ci}}</td>
                                    <td>{{i.celular}}</td>
                                    <td>{{i.direccion}}</td>
                                    <td>{{i.objetivo}}</td>
                                    <td>{{i.codDetalle}}</td>
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
                requisito:{},
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
                this.requisito={};
            }
        }
    }
</script>
