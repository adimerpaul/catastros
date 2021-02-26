<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white">REGISTRO</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" @click="crear" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar">
                           <i class="fa fa-plus"></i> CREAR USUARIO
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Registro Nuevo</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="guardar">                                            
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="user.name" class="form-control" id="name" placeholder="Nombre">
                                                </div>
                                                <label for="email" class="col-sm-3 col-form-label">Correo</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="user.email" class="form-control" id="email" placeholder="Correo">
                                                </div>
                                                <label for="password" class="col-sm-3 col-form-label">Contraseña</label>
                                                <div class="col-sm-8">
                                               <input type="password" v-model="user.password" class="form-control" id="password" placeholder="password">
                                                </div>
                                                <label for="password2" class="col-sm-3 col-form-label">Repetir C.</label>
                                                <div class="col-sm-8">
                                                <input type="password" v-model="user.password2" class="form-control" id="password2" placeholder="Repetir password">
                                                </div>
                                                <label for="tipo" class="col-sm-3 col-form-label">Tipo</label>
                                                <div class="col-sm-8">
                                                <select name="tipo" v-model="user.tipo" id="tipo" class="form-control" required>
                                                    <option value="Recepcionista">Recepcionista</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
                                                </div>
                                                <label for="tipo2" class="col-sm-3 col-form-label">Unidad</label>
                                                <div class="col-sm-8">
                                                    <select name="tipo" v-model="user.unit_id" id="tipo2" class="form-control" required>
                                                        <option v-for="(i,index) in units" :key="index" :value="i.id">{{i.unidad}}</option>
                                                    </select>
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
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>                                  
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="update">                                            
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="user.name" class="form-control" id="name1">
                                                </div>
                                                <label for="email" class="col-sm-3 col-form-label">email</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="user.email" class="form-control" id="Correo">
                                                </div>
                                                                                
                                                <label for="tipo" class="col-sm-3 col-form-label">Tipo</label>
                                                <div class="col-sm-8">
                                                    <select name="tipo" v-model="user.tipo" id="tipo2" class="form-control" required>
                                                        <option value="Recepcionista">Recepcionista</option>
                                                        <option value="Admin">Admin</option>
                                                    </select>
                                                </div>
                                                 <label for="tipo2" class="col-sm-3 col-form-label">Unidad</label>
                                                <div class="col-sm-8">
                                                    <select name="tipo" v-model="user.unit_id" id="tipo2" class="form-control" required>
                                                    <option v-for="(i,index) in units" :key="index" :value="i.id">{{i.unidad}}</option>
                                                    </select>
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
           
 
  <div class="modal fade" id="modalpass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" >Modificar password</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="passact">
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" v-model="user.password" class="form-control" id="passwordn" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password2" class="col-sm-3 col-form-label">Repetir password</label>
                                                <div class="col-sm-9">
                                                    <input type="password" v-model="user.password2" class="form-control" id="passwordm2" placeholder="Repetir password" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash"></i> Cancelar</button>
                                                <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Modificar password</button>
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
                                    <th>Tipo</th>
                                    <th>Email</th>
                                    <th>Unidad</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(i,index) in users" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{i.name}}</td>
                                    <td>{{i.tipo}}</td>
                                    <td>{{i.email}}</td>
                                    <td>{{i.unit.unidad}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" @click="actualizar(i)"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-dark btn-sm p-1" @click="pass(i)"><i class="fa fa-key"></i></button>
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
                user:{},
                users:[],
                units:[],
            }
        },
        mounted() {
            //console.log('Component mounted.');
            this.datos();
            axios.get('/unit').then(res=>{
                    this.units=res.data;
                })
        },
        methods:{
            guardar(){
                axios.post('/user',this.user).then(res=>{
                    $('#registrar').modal('hide');
                    this.datos();
                    this.user={};
                    this.$swal('Registro','exitoso','success');
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
                axios.get('/user').then(res=>{
                    this.users=res.data;
                })
            },

            passact(){
                //console.log(this.user);
                axios.put('/passact/'+this.user.id,this.user).then(res=>{
                    this.datos();
                    this.user={};
                    $('#modalpass').modal('hide');
                    this.$swal('Contraseña actualizado','exitoso','success');
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

             pass(i){
                $('#modalpass').modal('show');
                this.user=i;
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
                        axios.delete('/user/'+id).then(res=>{
                            this.datos();
                            this.$swal('Eliminado','Tramite Eliminado','success');
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
                this.user=i;
                $('#modificar').modal('show');
            },
            update(){
                console.log(this.user);
                if(this.user.password==this.user.password2){
                axios.put('/user/'+this.user.id, this.user).then(res=>{
                    $('#modificar').modal('hide');
                    this.datos();
                    this.user={};
                    this.$swal('Actualizado','exitoso','success');
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
            },
            crear(){
                this.user={};
            },


            activado:function(){
                if(this.user.password==this.user.password2){
                    return false;
                }else{
                    return true;
                }
            }
        }


        
    }
</script>
