<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-success text-white"> <i class="fa fa-file"></i> Tramites</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-plus-circle"></i> Registro Documentos
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Papeleo</h5>                                        
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="guardar">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                <label for="ci">Carnet de identidad</label>
                                                <input type="text" class="form-control" id="ci" v-model="documento.ci" @keyup="buscarci()" placeholder="Carnet de identidad">
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" v-model="persona.nombre"  placeholder="Nombres">
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="apellido">Apellido</label>
                                                <input type="text" class="form-control" id="apellido" v-model="persona.apellidos" placeholder="Apellidos">
                                                </div>
                                            </div>
                                            <div class="form">
                                                <div class="field-wrapper input">
                                                    <label for="nom">Nombre Tramite</label>                                                    
                                                    <input type="text" class="form-control" id="nom" v-model="documento.nombre">
                                                </div>
                                                <div class="field-wrapper input">
                                                    <label for="unid">Unidad</label>
                                                    <input type="text" class="form-control" id="unid" v-model="documento.unidad">
                                                </div>
                                                <div class="field-wrapper input">
                                                    <label for="tipoT">Tipo de Tramite</label>                                    
                                                    <select name="" id="tipoT" class="form-control"  @change="onChange($event)"  >
                                                        <option v-for="(i,index) in requisitos"  :key="index" :value="i.id">{{i.nombre}}</option>
                                                    </select>
                                                    
                                                </div><br>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    Papeles Requeridos
                                                </button> <br>

                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Requisitos</h5>
                                                            </div>
                                                            <div class="modal-body">                                                                
                                                                <form>
                                                                    <label for="titulo">Chequeo de documentos</label>
                                                                    <div class="form-group">
                                                                        
                                                                    </div>
                                                                    <button type="button" class="btn btn-secondary" @click="cerrar2d"> Cancelar</button>
                                                                    <button type="submit" class="btn btn-success"> Revisado</button>
                                                                </form>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div><br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash"></i> Cerrar</button>
                                                
                                                <button v-if="guar" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guargar Datos</button>
                                                <button v-else class="btn btn-success" type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    Guargar Datos
                                                </button>
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
                                    <th>CI</th>
                                    <th>Unidad</th>
                                    <th>Sel Tramite</th>
                                    <th>Historial</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(i,index) in documentos" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{i.nombre}}</td>                                    
                                    <td>{{i.ci}}</td>
                                    <td>{{i.unidad}}</td>
                                    <td>{{i.tipoTra}}</td>                                   
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
                documento:{},
                documentos:[],
                //requisitos:{},
                requisitos:[],
                requisito:{},
                guar:true,
                persona:{},
            }
        },
        mounted() {
            //console.log('Component mounted.');
            this.datos();
        },
        methods:{
            onChange(event) {
                let s=this.requisitos.find(requisito=>{
                    requisito.id=event.target.value;
                })
                console.log(s)
            },
            buscarci(){
                    //console.log(this.documento.ci);
                    if(this.documento.ci!=''){
                        axios.get('/persona/'+this.documento.ci).then(res=>{
                            console.log(res.data);
                            this.persona=res.data;
                            
                        })
                    }
                        
            },
            cerrar2d(){

                $('#staticBackdrop').modal('hide');
            },
            guardar(){
                axios.post('/documento',this.documento).then(res=>{
                    $('#registrar').modal('hide');
                    this.datos();
                    this.documento={};
                })
            },
            datos(){
                /*axios.get('/documento').then(res=>{
                    this.documentos=res.data;
                })*/

                axios.get('/requisito').then(res=>{
                    console.log(res.data);
                    this.requisitos=res.data;
                })
            },
            eliminar(id){
                if(confirm('Seguro desea eliminar?')){
                    axios.delete('/documento/'+id).then(res=>{
                        this.datos();
                    });
                }
            },
            actualizar(i){
                this.documento=i;
                $('#modificar').modal('show');
            },
            update(){
                axios.put('/documento/'+this.documento.id, this.documento).then(res=>{
                    $('#modificar').modal('hide');
                    this.datos();
                    this.documento={};
                })
            },
            crear(){
                this.documento={};
            }
        }
    }
</script>