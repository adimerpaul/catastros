<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header bg-success text-white"> <i class="fa fa-folder"></i> Unidad {{usuario.unit.unidad}}</div>
                    <div class="card-body " >
<!--                        {{logs}}-->
                        <div class="text-right">
                            <button @click="misdatos()" class="btn btn-warning btn-sm">
                                <template v-if="boolActualizar">
                                    Actualizar <i class="fa fa-refresh"></i>
                                </template>
                                <div v-else class="spinner-border spinner-border-sm" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </button>

                        </div>

                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigounidad</th>
                                <th>De</th>
                                <th>A</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(i,index) in logs" :key="index">
                                <td>{{index+1}}</td>
                                <td>{{i.documento.codigounidad}}</td>
                                <td>{{i.unit1.unidad}}</td>
                                <td>{{i.unit2.unidad}}</td>
                                <td>{{i.user.name}}</td>
                                <td>{{i.created_at|moment("YYYY-MM-DD HH:mm")}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button @click="enviar(i)" class="btn btn-info btn-sm text-white">Enviar <i class="fa fa-plus-circle"></i></button>
                                        <button @click="terminar(i)" class="btn btn-danger btn-sm">Terminar <i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="enviar" tabindex="-1" role="dialog" aria-labelledby="enviarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="enviarLabel"> <i class="fa fa-file"></i> Enviar a unidad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateSend()">
                            <div class="form-group row">
                                <label for="tipo2" class="col-sm-3 col-form-label">Unidad</label>
                                <div class="col-sm-8">
                                    <select name="tipo" v-model="dato.unit_id2" id="tipo2" class="form-control" required>
                                        <option v-for="(i,index) in units" :key="index" :value="i.id">{{i.unidad}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash"></i> Cerrar</button>
                                <button v-if="boolActualizar" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                                <button v-else  class="btn btn-success">
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import datatable from 'datatables.net-bs4';
    export default {
        data(){
          return{
              logs:[],
              units:[],
              dato:{},
              log:{},
              usuario:{unit:{unidad:''}},
              boolActualizar:true,
              boolSend:true,
          }
        },
        mounted() {
            this.misdatos();
            // $('#example').DataTable();
            axios.get('/usuario').then(res=>{
                this.usuario=res.data;
            }).catch(e=>{
                this.$swal({
                    title: "Error",
                    text: e.response.data.message,
                    type: "error",
                    // timer: 3000
                })

            });
            axios.get('/unit').then(res=>{
                this.units=res.data;
                // console.log(res.data);
                // console.log(this.units);
            }).catch(e=>{
                this.$swal({
                    title: "Error",
                    text: e.response.data.message,
                    type: "error",
                    // timer: 3000
                })

            });

        },
        methods:{
            updateSend(){
                // console.log(this.log);
                this.dato.id=this.log.id;
                this.dato.documento_id=this.log.documento_id;
                axios.post('/archivo',this.dato).then(res=>{
                    // this.usuario=res.data;
                    // console.log(res.data);
                    $('#example').DataTable().destroy();
                    this.misdatos();
                    $('#enviar').modal('hide');
                    this.$swal({
                        title: "Enviado",
                        text: 'Correctamnete',
                        type: "success",
                        timer: 3000
                    })
                }).catch(e=>{
                    this.$swal({
                        title: "Error",
                        text: e.response.data.message,
                        type: "error",
                        // timer: 3000
                    })

                });
            },
            terminar(i){
                this.log=i;
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
                        this.dato.id=this.log.id;
                        this.dato.documento_id=this.log.documento_id;
                        axios.post('/terminar',this.dato).then(res=>{
                            // this.usuario=res.data;
                            console.log(res.data);
                            $('#example').DataTable().destroy();
                            this.misdatos();
                            $('#enviar').modal('hide');
                            this.$swal({
                                title: "Terminado",
                                text: 'Correctamnete',
                                type: "success",
                                timer: 3000
                            })
                        }).catch(e=>{
                            this.$swal({
                                title: "Error",
                                text: e.response.data.message,
                                type: "error",
                                // timer: 3000
                            })

                        });
                    }
                });

                // console.log(this.log);

            },
            misdatos(){
                this.boolActualizar=false;
                axios.get('/archivo').then(res=>{
                    this.logs=res.data;
                    // console.log(this.logs);
                    $('#example').DataTable().destroy();
                    this.tabla();

                    this.boolActualizar=true;
                }).catch(e=>{
                    this.$swal({
                        title: "Error",
                        text: e.response.data.message,
                        type: "error",
                        // timer: 3000
                    })
                    //
                    this.boolActualizar=true;
                })
            },
            tabla(){
                this.$nextTick(()=>{
                    $('#example').DataTable();
                });
            },
            enviar(i){
                this.log=i;
                $('#enviar').modal('show');
            }
        }
    }
</script>
