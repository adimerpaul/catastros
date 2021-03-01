<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white"> <i class="fa fa-history"></i> Historial de un documento</div>
                    <div class="card-body " >
                        <div class="row">
                            <div class="col-6">
                                <form>
                                    <div class="form-group row">
                                        <label for="Numero" class="col-sm-3 col-form-label">Numero</label>
                                        <div class="col-sm-5">
                                            <input type="password" class="form-control" id="Numero" placeholder="Numero de documento">
                                        </div>
                                        <div class="col-sm-4">
                                            <button ></button>
                                        </div>
                                    </div>
                                </form>
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
