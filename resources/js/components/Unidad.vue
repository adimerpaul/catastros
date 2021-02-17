<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">UNIDADES</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" @click="crear" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar">
                           <i class="fa fa-plus"></i> Unidad
                        </button>



                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
