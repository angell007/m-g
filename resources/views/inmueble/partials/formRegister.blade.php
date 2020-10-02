<div class="modal fade " tabindex="-1" role="dialog" data-backdrop="static" data-ajax-modal id="modalInmuebleRegister">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content py-3 ">

            <div class="card-header text-dark">Registrar Inmueble
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="card-body">

                <form class="form-row text-left" id="formInmuebleRegister" method=""
                    action="{{route('inmuebles.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="form-group col-md-6 ">
                                <label class=" text-dark">Propietario</label>
                                <input class="form-control form-control-sm" list="propietario_id" autocomplete="off"
                                    name="propietario_id" formControlName="propietario_id">
                                <datalist class="col-md-6" style="width: 100%;" id="propietario_id"></datalist>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Dirección</label>
                                <input type="text" class="form-control form-control-sm" required="required"
                                    name="direccion" tag="Direccion">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Ciudad</label>
                                <input type="text" class="form-control form-control-sm" required="required"
                                    name="ciudad" tag="Ciudad">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Departamento</label>
                                <input type="text" class="form-control form-control-sm" required="required"
                                    name="departamento" tag="Departamento">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Tipo</label>
                                <select class="form-control form-control-sm" required="required" name="tipo">
                                    <option disabled selected> Selecciona...</option>
                                    <option value="Apartamento">Apartamento</option>
                                    <option value="Bodega">Bodega</option>
                                    <option value="Casa">Casa</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Proposito</label>
                                <select class="form-control form-control-sm" required="required" name="proposito">
                                    <option disabled selected> Selecciona...</option>
                                    <option value="venta">Venta</option>
                                    <option value="arrendamiento">Arrendamiento</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Habitaciones</label>
                                <input type="number" class="form-control form-control-sm" required="required"
                                    name="habitaciones">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Canon</label>
                                <input type="currency" class="form-control form-control-sm" required="required"
                                    name="canon">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Precio venta</label>
                                <input type="currency" class="form-control form-control-sm" required="required"
                                    name="precio">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="file" id="file" name="portada"  />
                                <label for="file" class="btn-1">Selecciona portada</label>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="text-dark">Descripcion</label>
                                <textarea class="form-control form-control-sm" name="descripcion" id=""
                                    rows="3"></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <input type="submit" class="btn btn-outline-info  btn-sm " id="btnSaveInmueble"
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