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
                                                    <label for="nom">Nombre Tramite</label>
                                                    <input type="text" class="form-control" id="nom" v-model="requisito.nombre">
                                                </div>
                                                <div class="field-wrapper input">
                                                    <label for="det">Detalle del tramite</label>
                                                    <input type="text" class="form-control" id="det" v-model="requisito.descripcion">
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
                        <div class="modal fade" id="modificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Modificar Tramite</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="update">
<div class="form">
                                                <div class="field-wrapper input">
                                                    <label for="nom">Nombre Tramite</label>
                                                    <input type="text" class="form-control" id="nom" v-model="requisito.nombre">
                                                </div>
                                                <div class="field-wrapper input">
                                                    <label for="det">Detalle del tramite</label>
                                                    <input type="text" class="form-control" id="det" v-model="requisito.descripcion">
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-trash"></i> Cerrar</button>
                                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guargar Datos</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table" border="1 solid black">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Documentos</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(i,index) in requisitos" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{i.nombre}}</td>
                                    <td>{{i.descripcion}}</td>
                                    <td>
                                        <ul>
                                            <li v-for="(d,index) in i.detalles" :key="index" >{{d.nombre}}</li>
                                        </ul>

                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button class="btn btn-warning btn-sm" @click="actualizar(i)"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btn-sm" @click="eliminar(i.id)"><i class="fa fa-trash"></i></button>
                                            <button class="btn btn-info btn-sm" @click="imprimir(i)"><i class="fa fa-print"></i></button>
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
</template>

<script>
    const axios=require('axios');
    import jsPDF from 'jspdf'

    import 'jspdf-autotable'

    export default {
        data(){
            return {
                requisito:{detalles:[{nombre:''}]},
                                //dato:{hijos:[{nombres:'',apellidos:''}]},
                requisitos:[],
                guar:true,
            }
        },
        mounted() {
            //console.log('Component mounted.');
            this.datos();
            //crear(){
            //    this.requisito={};
            //}
        },
        methods:{
             imprimir (i) {
                const doc = new jsPDF({
                    orientation:"landscape",
                    unit: "cm",
                    format: "letter"
                })

                // It can parse html:
                // <table id="my-table"><!-- ... --></table>
                var pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth();
                var text=i.nombre;
                var t2=i.descripcion;
                if (t2==null)t2='';
                doc.text(text,pageWidth/2,3,'center');
                doc.text(t2, pageWidth/2,4,'center');
                //doc.autoTable({ html: '#table' })

                // Or use javascript directly:
                let body=[];
                let con=0;
                i.detalles.forEach(row => {
                    con++;
                    body.push([con,row.nombre]);
                });
                doc.autoTable({
                theme: 'grid',
                styles: { fillColor: [255, 0, 0] },
                columnStyles: { 0: { halign: 'center', fillColor: [255, 0, 0], textColor: [255,255,255] } }, // Cells in first column centered and green
                columnStyles: { 1:{fillColor:[255,255,255]}},
                startY:5,
                head: [['#', 'DOCUMENTOS NECESARIOS']],
                body:body,
                })

                doc.save('table.pdf')

            },
            mas(){
                this.requisito.detalles.push({nombres:'',apellidos:''});
            },
            menos(index){
                this.requisito.detalles.splice(index, 1);
            },
            guardar(){
                this.guar=false;
                axios.post('/requisito',this.requisito).then(res=>{
                    $('#registrar').modal('hide');
                    this.datos();
                    this.requisito={};
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
                axios.get('/requisito').then(res=>{
                    this.requisitos=res.data;
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
                        axios.delete('/requisito/'+id).then(res=>{
                            this.datos();
                            this.$swal('Invalido','Tramite Eliminado','success');
                        });
                    }
                })
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
                    this.$swal('Modificado','Guardado Correctamente','success');
                })
            },
            crear(){
                this.requisito={detalles:[{nombre:''}]};
            }
        }
    }
</script>
