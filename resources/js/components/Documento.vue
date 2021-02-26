<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-success text-white"> <i class="fa fa-file"></i> Tramites</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" @click="crear" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registrar">
                            <i class="fa fa-plus-circle"></i> Registro Documentos
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="registrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="exampleModalLabel"><b>Nuevo Papeleo</b></h5>
                                    </div>
                                    <div class="modal-body">
                                        <form @submit.prevent="guardar">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                <label for="ci">
                                                    Carnet de identidad
                                                    <div v-if="bu" class="spinner-border spinner-border-sm" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                    </div>
                                                </label>
                                                <input type="text" class="form-control" id="ci" v-model="ci" @keyup="buscarci()" placeholder="Carnet de identidad" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="nombre">Nombres </label>
                                                <input type="text" class="form-control" id="nombre" v-model="documento.nombre"  placeholder="Nombres" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="apellido">Apellidos</label>
                                                <input type="text" class="form-control" id="apellido" v-model="documento.apellidos" placeholder="Apellidos" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="numH">Numero de Hojas</label>
                                                    <input type="number" class="form-control" id="numH" max="100" min="5" v-model="documento.nroHojas">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="codigounidad">Codigo unidad</label>
                                                    <input type="text" class="form-control" id="codigounidad" max="100" min="5" v-model="documento.codigounidad">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="instruccion">instruccion</label>
                                                    <input type="text" class="form-control" id="instruccion" max="100" min="5" v-model="documento.instruccion">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="unid">Unidad</label>
                                                    <select name="" id="unid" class="form-control" v-model="documento.unit_id" >
                                                        <option v-for="(i,index) in units"  :key="index" :value="i.id">{{i.unidad}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="tipoT">Tipo de Tramite</label>
                                                    <select name="" id="tipoT" class="form-control"  @change="onChange($event)" v-model="documento.requisito_id" >
                                                        <option v-for="(i,index) in requisitos"  :key="index" :value="i.id">{{i.nombre}}</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class=" from mt-3 form-group row">
                                                <div class="col-sm-2">Requisitos</div>
                                                <div class="col-sm-10">
                                                <div v-for="(i,index) in requisito.detalles" :key="index" class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                                    <label class="form-check-label" for="gridCheck1">
                                                    {{i.nombre}}
                                                    </label>
                                                </div>
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



                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Carnet de Identidad</th>
                                    <th scope="col">Nombre completo</th>
                                    <th scope="col">Nro de Hojas</th>
                                    <th scope="col">Unidad</th>
                                    <th scope="col">Tramite Realizado</th>
                                    <th scope="col" style="width: 110px">Fecha</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(i,index) in documentos" :key="index">
                                    <th scope="row">{{index+1}}</th>
                                    <td>{{i.persona.ci}}</td>
                                    <td>{{i.persona.nombre}} {{i.persona.apellidos}}</td>
                                    <td>{{i.nroHojas}}</td>
                                    <td>{{i.unit.unidad}} <br><b>INSTRUCCION:</b> {{i.instruccion}}</td>
                                    <td>{{i.requisito.nombre}}</td>
                                    <th>{{i.created_at| moment("YYYY-MM-DD")}} </th>
                                    <td>
                                        <div class="btn-group">
<!--                                            <button class="btn btn-warning btn-sm" @click="actualizar(i)"><i class="fa fa-pencil"></i></button>-->
<!--                                            <button class="btn btn-danger btn-sm" @click="eliminar(i.id)"><i class="fa fa-trash"></i></button>-->
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
    import moment from 'moment'
    export default {
        data(){
            return {
                bu:false,
                documento:{nombre:'',apellidos:''},
                documentos:[],
                ci:'',
                requisito:{detalles:[{nombre:''}]},
                requisitos:[],
                detalles:[],
                unit:{},
                units:[],
                guar:true,
                persona:{},
            }
        },
        mounted() {
            //console.log('Component mounted.');
            this.datos();
            axios.get('/requisito').then(res=>{
                    //console.log(res.data);
                    this.requisitos=res.data;
                })

                axios.get('/unit').then(res=>{
                     console.log(res.data);
                    this.units=res.data;
                })
        },
        methods:{
            imprimir (i) {
                const doc = new jsPDF({
                    orientation:"portrait",
                    unit: "mm",
                    format: [210,125]
                })

                // It can parse html:
                // <table id="my-table"><!-- ... --></table>
                var pageWidth = doc.internal.pageSize.width || doc.internal.pageSize.getWidth();
                var pageHeigth = doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
                var text="GOBIERNO AUTONOMO MUNICIPAL DE ORURO";
                var t1="HOJA DE TRAMITE";
                var t2=i.codigounidad;
                var t3=(i.nroHojas).toString();
                var t4=moment(i.created_at).format('DD-MM-YYYY');
                var t5="Procedencia: ";
                var t6="Referencia: ";
                doc.addImage("img/gamo1.jpg", "JPEG", 14,30,97,165);
                doc.setFont("times","bold");
                doc.setFontSize(10);
                doc.text(text,pageWidth/2,6,'center');
                doc.text(t1,19,15,'left');
                doc.text("Registro No. " + t2,110,11,'right');
                doc.text("Nro de Hojas: "+ t3,110,15,'right');
                doc.text("Fecha de Ingreso: " + t4,110,19,'right');
                doc.text(t5,16,24,'left');
                doc.text(t6,16,29,'left');
                let body=[];
                let con=0;
                let de='';
                let aaa='';
                let bbb='';
                let instrucciones=['Urgente','Informe en el dia','Reuna antecedentes','Remita antecedentes','Instruya su ejecucion','Archive','Conteste Carta','Verificar y procesar'
                ,'Efectue liquidacion','Remitase a la MAE','Informe','Su Atencion','',];
                this.units.forEach(row => {

                    body.push([con+1,row.unidad,de,aaa,instrucciones[con],bbb]);
                    con++;
                });
                doc.autoTable({

                theme: 'plain',
                tableLineColor: [0, 0, 0],
                tableLineWidth: 0.1,
                styles: {
                    font: 'times',
                    fontSize: '8',
                    lineColor: [0, 0, 0],
                    lineWidth: 0.1,
                },
                startY:30,

                head: [['#', 'UNIDAD','DE','A','INSTRUCCION','~']],
                body:body,
                })
                doc.autoTable({
                    theme: 'plain',
                    tableLineColor: [0, 0, 0],
                    tableLineWidth: 0.1,
                    styles: {
                        font: 'times',
                        fontSize: '8',
                        lineColor: [0, 0, 0],
                        minCellHeight: 5,
                    },
                    startY:154,
                    body:[['Para'],['Instrucciones Complementarias'],['                                                                                                FIRMA Y SELLO']
                         ,['Para'],['Instrucciones Complementarias'],['                                                                                                FIRMA Y SELLO']],
                })

                doc.save('table.pdf')

            },
            onChange(event) {
                //console.log(event.target.value)
                this.requisito = this.requisitos.find(  d => parseInt(d.id) === parseInt(event.target.value))
                 //console.log(this.requisito);

            },
            buscarci(){
                    //console.log(this.documento.ci);
                    if(this.ci!=''){
                        this.bu=true;
                        axios.get('/persona/'+this.ci).then(res=>{
                            this.bu=false;
                            if(res.data!=''){
                                this.documento=res.data;
                                //console.log(this.documento);
                            }else{
                                this.documento={};
                            }

                            //this.documento.apellidos=res.data.apellidos;

                        })
                    }

            },
            cerrar2d(){

                $('#staticBackdrop').modal('hide');
            },
            guardar(){
                //console.log();
                //return false;
                this.guar=false;
                this.documento.ci=this.ci;
                //this.documento.ci=this.ci;
                //this.documento.ci=this.ci;
                axios.post('/documento',this.documento).then(res=>{
                    //console.log(res.data);
                    //return false;
                    $('#registrar').modal('hide');
                    this.datos();
                    this.documento={};
                    this.$swal('Registro','exitoso','success');
                    this.guar=true;
                })
            },
            datos(){
                axios.get('/documento').then(res=>{
                    this.documentos=res.data;
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
                this.ci='';
                this.requisito={};
            }
        }
    }
</script>
