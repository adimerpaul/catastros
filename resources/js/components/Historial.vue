<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white"> <i class="fa fa-history"></i> Historial de un documento</div>
                    <div class="card-body " >
                        <div class="row">
                            <div class="col-6">
                                <form @submit.prevent="buscar">
                                    <div class="form-group row">
                                        <label for="Numero" class="col-sm-3 col-form-label">Numero</label>
                                        <div class="col-sm-5">
                                            <input type="text" v-model="id" class="form-control" id="Numero" placeholder="Numero de documento" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="submit" class="btn btn-dark"> Consultar <i class="fa fa-check-circle"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <form @submit.prevent="buscar">
                                    <div class="form-group row">
                                        <label for="Numero" class="col-sm-3 col-form-label">Persona:</label>
                                        <div class="col-sm-9">
                                            <label class="col-form-label">{{documento.persona.apellidos}} {{documento.persona.nombre}}</label>
                                        </div>
                                        <label for="Numero" class="col-sm-3 col-form-label">Celular:</label>
                                        <div class="col-sm-9">
                                            <label class="col-form-label">{{documento.persona.celular}}</label>
                                        </div>
                                        <label for="Numero" class="col-sm-3 col-form-label">Carnet:</label>
                                        <div class="col-sm-9">
                                            <label class="col-form-label">{{documento.persona.ci}}</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6">
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
                                        <tr>
                                            <td></td>
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
                documento:{persona:{}}
            }
        },
        mounted() {
            // console.log('Component mounted.')
        },
        methods:{
            buscar(){
                axios.get('/archivo/'+this.id).then(res=>{
                    console.log(res.data);
                    if(res.data==''){
                        this.documento={persona:{}}
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
