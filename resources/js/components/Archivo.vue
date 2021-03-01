<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white"> <i class="fa fa-folder"></i> Unidad {{usuario.unit.unidad}}</div>
                    <div class="card-body text-center" >
<!--                        {{archivos}}-->
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>De</th>
                                <th>A</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(i,index) in archivos" :key="index">
                                <td>{{index+1}}</td>
                                <td>{{i.unit1.unidad}}</td>
                                <td>{{i.unit2.unidad}}</td>
                                <td>{{i.user.name}}</td>
                                <td>{{i.created_at|moment("YYYY-MM-DD HH:mm")}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button @click="enviar(i)" class="btn btn-info btn-sm text-white">Enviar <i class="fa fa-plus-circle"></i></button>
                                        <button class="btn btn-danger btn-sm">Terminar <i class="fa fa-times"></i></button>
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
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="enviarLabel"> <i class="fa fa-file"></i> Enviar Archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
              archivos:[],
              units:[],
              archivo:{},
              usuario:{unit:{unidad:''}},
          }
        },
        mounted() {
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
                this.guar=true;
            });
            axios.get('/units').then(res=>{
                this.units=res.data;
            }).catch(e=>{
                this.$swal({
                    title: "Error",
                    text: e.response.data.message,
                    type: "error",
                    // timer: 3000
                })
                this.guar=true;
            });
            axios.get('/archivo').then(res=>{
                this.archivos=res.data;
                // console.log(this.archivos);
                $('#example').DataTable().destroy();
                this.tabla();
            }).catch(e=>{
                this.$swal({
                    title: "Error",
                    text: e.response.data.message,
                    type: "error",
                    // timer: 3000
                })
                this.guar=true;
            })
        },
        methods:{
            tabla(){
                this.$nextTick(()=>{
                    $('#example').DataTable();
                });
            },
            enviar(i){
                this.documento=i;

            }
        }
    }
</script>
