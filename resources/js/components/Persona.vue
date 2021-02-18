<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white"> <i class="fa fa-user"></i> Control Personas</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" @click="crear" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registrar">
                           <i class="fa fa-plus-circle"></i> Crear persona 
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Registro Nuevo</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="guardar">                                            
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="persona.nombre" class="form-control" id="nombre" placeholder="Nombre">
                                                </div>
                                                <label for="apellidos" class="col-sm-3 col-form-label">Apellidos</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="persona.apellidos" class="form-control" id="apellidos" placeholder="Apellidos">
                                                </div>
                                                <label for="ci" class="col-sm-3 col-form-label">CI</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="persona.ci" class="form-control" id="ci" placeholder="CI">
                                                </div>
                                                <label for="celular" class="col-sm-3 col-form-label">Celular</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="persona.celular" class="form-control" id="celular" placeholder="Celular">
                                                </div>
                                                <label for="direccion" class="col-sm-3 col-form-label">Direccion</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="persona.direccion" class="form-control" id="direccion" placeholder="Direccion">
                                                </div>
                                                
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Guardar</button>
                                            </div>
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
                                        <h5 class="modal-title" id="exampleModalLabel2">Modificar Dato</h5>                                        
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="update">                                            
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="persona.nombre" class="form-control" id="nombre">
                                                </div>
                                                <label for="apellidos" class="col-sm-3 col-form-label">Apellidos</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="persona.apellidos" class="form-control" id="apellidos">
                                                </div>
                                                <label for="ci" class="col-sm-3 col-form-label">CI</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="persona.ci" class="form-control" id="ci">
                                                </div>
                                                <label for="celular" class="col-sm-3 col-form-label">Celular</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="persona.celular" class="form-control" id="celular">
                                                </div>
                                                <label for="direccion" class="col-sm-3 col-form-label">Direccion</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="persona.direccion" class="form-control" id="direccion">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash"></i> Cerrar</button>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
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
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(i,index) in personas" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{i.nombre}}</td>
                                    <td>{{i.apellidos}}</td>
                                    <td>{{i.ci}}</td>
                                    <td>{{i.celular}}</td>
                                    <td>{{i.direccion}}</td>
                                   
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
                persona:{},
                personas:[]
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.datos();
        },
        methods:{
            guardar(){
                this.guar=false;
                axios.post('/persona',this.persona).then(res=>{
                    $('#registrar').modal('hide');
                    this.datos();
                    this.persona={};
                    this.$swal('Registro','exitoso','success');
                    this.guar=true;
                }).catch(e=>{
                    //this.$swal('Registro','exitoso','success');
                    this.$swal({
                        title: "Error",
                        text: e.response.data.message,
                        type: "error",
                        // timer: 3000
                    })
                    this.guar=true;
                })
            },
            datos(){
                axios.get('/persona').then(res=>{
                    this.personas=res.data;
                })
            },
             eliminar(id){
                this.$swal({
                    title: 'Estas seguro?',
                    text: "No podras revertir el proceso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Hazlo!',
                    cancelButtonText: 'No.'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete('/persona/'+id).then(res=>{
                            this.datos();
                            this.$swal('Eliminado','Correctamente','success');
                        }).catch(e=>{
                            //this.$swal('Registro','exitoso','success');
                            this.$swal({
                                title: "Error",
                                text: e.response.data.message,
                                type: "error",
                                // timer: 3000
                            })
                            this.guar=true;
                        })
                    }
                })
            },
            actualizar(i){
                this.persona=i;
                $('#modificar').modal('show');
            },
            update(){
                axios.put('/persona/'+this.persona.id, this.persona).then(res=>{
                    $('#modificar').modal('hide');
                    this.datos();
                    this.persona={};
                    this.$swal('Modificado','Guardado Correctamente','success');
                })
            },
            crear(){
                this.persona={};
            }
        }
    }
</script>
