<div class="modal fade " tabindex="-1" role="dialog" data-backdrop="static" data-ajax-modal id="modalContratoRegister">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content py-3 ">

            <div class="card-header text-dark">Registrar Contrato
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="card-body">

                <form class="form-row text-left" id="formContratoRegister" method=""
                    action="{{route('contratos.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            {{-- <div class="form-group col-md-6 ">
                                <label class=" text-dark">Propietario</label>
                                <input class="form-control form-control-sm" list="propietario_id" autocomplete="off"
                                    name="propietario_id" formControlName="propietario_id">
                                <datalist class="col-md-6" style="width: 100%;" id="propietario_id"></datalist>
                            </div> --}}

                            <div class="form-group col-md-6 ">
                                <label class=" text-dark">Arrendatarios</label>
                                <input class="form-control form-control-sm" list="arrendatario_id" autocomplete="off"
                                    name="arrendatario_id" formControlName="arrendatario_id">
                                <datalist class="col-md-6" style="width: 100%;" id="arrendatario_id"></datalist>
                            </div>

                            <div class="form-group col-md-6 ">
                                <label class=" text-dark">Inmuebles</label>
                                <input class="form-control form-control-sm" list="inmueble_id" id="customID"
                                    autocomplete="off" name="inmueble_id" formControlName="inmueble_id">
                                <datalist class="col-md-6" style="width: 100%;" id="inmueble_id"></datalist>
                            </div>

                            <div class="form-group col-md-12 ">
                                <label class=" text-dark">Canon</label>
                                <input type="number" disabled id="canon" class="form-control form-control-sm"
                                    placeholder="canon ">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Inicio de Contrato </label>
                                <input type="date" class="form-control form-control-sm" name="inicio">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Final de contrato</label>
                                <input type="date" class="form-control form-control-sm" name="fin">
                            </div>

                            <div class="form-group col-md-12">
                                <label class="text-dark">Observaciones</label>
                                <textarea class="form-control form-control-sm" name="observaciones" rows="3"></textarea>
                            </div>

                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit" class="btn btn-outline-info  btn-sm " id="btnSaveContrato"
                                value="Enviar">
                            <button type="button" class="btn btn-outline-dark btn-sm "
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>