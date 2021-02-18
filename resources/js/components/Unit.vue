<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">UNIDADES</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" @click="crear" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar">
                           <i class="fa fa-plus"></i>NUEVA UNIDAD
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nueva Unidad</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="guardar">                                            
                                            <div class="form-group row">
                                                <label for="unidad" class="col-sm-3 col-form-label">Unidad</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="unit.unidad" class="form-control" id="unidad" placeholder="Nombre de unidad">
                                                </div>
                                                <label for="detalles" class="col-sm-3 col-form-label">Detalles</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="unit.detalles" class="form-control" id="detalles" placeholder="detalles">
                                                </div>
                                                                 
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash"></i> Cerrar</button>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
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
                                                <label for="unidad" class="col-sm-3 col-form-label">Unidad</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="unit.unidad" class="form-control" id="unidad">
                                                </div>
                                                <label for="detalles" class="col-sm-3 col-form-label">Detalles</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="unit.detalles" class="form-control" id="detalles">
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
                                    <th>Unidad</th>
                                    <th>Detalles</th>
                                    <th>Opciones</th>
                                 </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(i,index) in units" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{i.unidad}}</td>
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
                unit:{},
                units:[]
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.datos();
        },
        methods:{
            guardar(){
                axios.post('/unit',this.unit).then(res=>{
                    $('#registrar').modal('hide');
                    this.datos();
                    this.unit={};
                })
            },
            datos(){
                axios.get('/unit').then(res=>{
                    this.units=res.data;
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
                        axios.delete('/unit/'+id).then(res=>{
                            this.datos();
                            this.$swal('Eliminado','Unidad Eliminado','success');
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
                this.unit=i;
                $('#modificar').modal('show');
            },
            update(){
                axios.put('/unit/'+this.unit.id, this.unit).then(res=>{
                    $('#modificar').modal('hide');
                    this.datos();
                    this.unit={};
                })
            },
            crear(){
                this.unit={};
            }
        }
    }
</script>
