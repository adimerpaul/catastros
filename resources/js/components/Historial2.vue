<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white"> <i class="fa fa-history"></i> Historial de un documento del Cliente</div>
                    <div class="card-body " >
                        <div class="row">
                            <div class="col-5">
                                <form @submit.prevent="buscar">
                                    <div class="form-group row">
                                        <label for="Numero" class="col-sm-3 col-form-label">Codigo unidad:</label>
                                        <div class="col-sm-5">
                                            <input type="text" v-model="id" class="form-control" id="Numero" placeholder="Numero de documento" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <button v-if="bool" type="submit" class="btn btn-dark"> Consultar <i class="fa fa-check-circle"></i></button>
                                            <button v-else class="btn btn-dark">
                                                <div class="spinner-border spinner-border-sm" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                            <div class="col-7">
                                <table class="table table-border">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>De:</th>
                                            <th>A:</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(i,index) in documento.logs" :key="index">
                                            <td>{{index+1}}</td>
                                            <td>{{i.unit1.unidad}}</td>
                                            <td>{{i.unit2.unidad}}</td>
                                            <td>{{i.created_at|moment("YYYY-MM-DD HH:mm")}}</td>
                                            <td>
                                                <div class="badge badge-success" :class="i.estado=='FINALIZADO'?'badge-danger':'badge-warning'">
                                                    {{i.estado}}
                                                </div>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                id:'',
                documento:{persona:{},logs:{}},
                bool:true,
            }
        },
        mounted() {
            // console.log('Component mounted.')
        },
        methods:{
            buscar(){
                this.bool=false;
                axios.get('/archivo2/'+this.id).then(res=>{
                    // console.log(res.data);
                    this.bool=true;
                    if(res.data==''){
                        this.documento={persona:{},logs:{}}
                        this.$swal({
                            title:'No se encontro',
                            text:'Registro',
                            icon:"info",
                            // time:3000
                        });
                    }else{
                        this.documento=res.data;
                    }
                }).catch(e=>{
                    //this.$swal('Registro','exitoso','success');
                    this.$swal({
                        title: "Error",
                        text: e.response.data.message,
                        type: "error",
                        // timer: 3000
                    })
                    this.guar=true;
                });
            }
        }
    }
</script>
