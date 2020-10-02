<div class="modal fade " tabindex="-1" role="dialog" data-backdrop="static" data-ajax-modal
    id="modalPropietarioRegister">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content py-3 ">

            <div class="card-header text-dark">Registrar Propietario
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="card-body">

        

                <form class="form-row text-left" id="formPropietarioRegister" method=""
                    action="{{route('propietarios.store')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label class="text-dark">Tipo de Identificación</label>
                                <select class="form-control form-control-sm" required="required"
                                    name="tipo_identificacion">
                                    <option disabled selected> Selecciona...</option>
                                    <option value="Cedula">Cedula</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                    <option value="Nit">Nit</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark"># Identificacion</label>
                                <input type="text" class="form-control form-control-sm" required="required"
                                    name="identificacion" tag="1096216530">
                            </div>

                            <div class="form-group col-md-6" id="blockNombre">
                                <label class="text-dark"> Nombres </label>
                                <input type="text" class="form-control form-control-sm" required="required"
                                    name="nombre" tag="Nombre">
                            </div>
                            <div class="form-group col-md-6" id="blockApellido">
                                <label class="text-dark">Apellidos </label>
                                <input type="text" class="form-control form-control-sm" required="required"
                                    name="apellido" tag="Apellido">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Mail </label>
                                <input type="email" class="form-control form-control-sm" required="required"
                                    name="email" tag="E-mail">
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
                                <label class="text-dark">Dirección</label>
                                <input type="text" class="form-control form-control-sm" required="required"
                                    name="direccion" tag="Direccion">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Barrio</label>
                                <input type="text" class="form-control form-control-sm" required="required"
                                    name="barrio" tag="Barrio">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Telefono</label>
                                <input type="phone" class="form-control form-control-sm" required="required"
                                    name="telefono" tag="Telefono">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="text-dark">Telefono (opcional)</label>
                                <input type="phone" class="form-control form-control-sm" name="opcional_telefono"
                                    tag="Telefono ">
                            </div>

                            <div class="form-group col-md-12">
                                <input type="submit" class="btn btn-outline-info  btn-sm " id="btnSavePropietario"
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