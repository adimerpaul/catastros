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
                                                    <label for="nombre">Nombre Tramite</label>
                                                    <!--select name="denuncia" id="denuncia" class="form-control" v-model="requisito.detalles" required>
                                                        <option value=""> Seleccionar...</option>
                                                        <option value="1"> Pago Impuestos a la transferencia</option>
                                                        <option value="2"> Legalizacion de Plano demostrativo</option>
                                                        <option value="3"> Certificacion general/Informe tecnico</option>
                                                        <option value="4"> Certificado catastral y Prestamo bancario</option>
                                                        <option value="5"> Empadronamiento y Cambio de nombre</option>
                                                        <option value="6"> Recatastracion</option>
                                                        <option value="7"> Regulacion de impuestos</option>
                                                        <option value="8"> Tramites de excedencia</option>
                                                        <option value="9"> Aprobacion de planos de construccion</option>
                                                        <option value="10"> Linea nivel y Orden de amurallamiento</option>
                                                        <option value="11"> Aprobacion de plano de fraccionamiento</option>
                                                        <option value="12"> Aprobacion planos de unificacion</option>
                                                        <option value="13"> Plano demostrativo individual</option>
                                                        <option value="14"> Planos de propiedad horizontal</option>
                                                    </select-->
                                                    <input type="text" class="form-control">
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
                                                        <tr v-for="(item,index) in requisito.detalles" :key="index">
                                                            <td>
                                                                {{index+1}}
                                                            </td>
                                                            <td>
                                                                <input type="text" v-model="item.nombre" style="padding: 0;margin: 0;border: 1px solid black">
                                                            </td>
                                                            <td>
                                                                <input type="text" v-model="item.unidad" style="padding: 0;margin: 0;border: 1px solid black">
                                                            </td>
                                                            <td>
                                                                <button type="button" @click="mas" class="btn btn-success btn-sm" style="padding: 0px">
                                                                    +
                                                                </button>
                                                                <button v-if="index!=0" type="button" @click="menos(index)" class="btn btn-danger btn-sm" style="padding: 0px">
                                                                    -
                                                                </button>
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
                                            <div class="form-group row">
                                                <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.nombre" class="form-control" id="nombre">
                                                </div>
                                                <label for="detalles" class="col-sm-3 col-form-label">Detalles</label>
                                                <div class="col-sm-8">
                                                <input type="text" v-model="requisito.detalles" class="form-control" id="detalles">
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
                                    <th>Documentos</th>                                    
                                    <th>Opciones</th>
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
                this.requisito={};
            }
        }
    }
</script>
