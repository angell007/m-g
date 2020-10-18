{{-- <div class="modal fade " tabindex="-1" role="dialog" data-backdrop="static" data-ajax-modal
    id="modalPropietarioUpdate">
    <div class="modal-dialog modal-lg " role="document"> --}}
<div class="container py-3">

    <div class="card-header text-dark">Actualizar Propietario
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
    </div>

    <div class="">
        <form class="form-row text-left" id="formPropietarioUpdate" method="post"
            action="{{route('propietario.update')}}">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <div class="row">

                    <input type="hidden" name="id">

                    <div class="form-group col-md-6">
                        <label class="text-dark"> Nombres </label>
                        <input type="text" class="form-control form-control-sm" required="required" name="nombre"
                            placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="text-dark">Apellidos </label>
                        <input type="text" class="form-control form-control-sm" required="required" name="apellido"
                            placeholder="Apellido">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark">Tipo de Identificación</label>
                        <select class="form-control form-control-sm" required="required" name="tipo_identificacion">
                            <option disabled selected> Selecciona...</option>
                            <option value="CC">CC</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Nit">Nit</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark"># Identificacion</label>
                        <input type="text" class="form-control form-control-sm" required="required"
                            name="identificacion" placeholder="1096216530">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark">Mail </label>
                        <input type="text" class="form-control form-control-sm" required="required" name="email"
                            placeholder="E-mail">
                    </div>


                    <div class="form-group col-md-6">
                        <label class="text-dark">Ciudad</label>
                        <input type="text" class="form-control form-control-sm" required="required" name="ciudad"
                            placeholder="Ciudad">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark">Departamento</label>
                        <input type="text" class="form-control form-control-sm" required="required" name="departamento"
                            placeholder="Departamento">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark">Dirección</label>
                        <input type="text" class="form-control form-control-sm" required="required" name="direccion"
                            placeholder="Direccion">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark">Barrio</label>
                        <input type="text" class="form-control form-control-sm" required="required" name="barrio"
                            placeholder="Barrio">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark">Telefono</label>
                        <input type="phone" class="form-control form-control-sm" required="required" name="telefono"
                            placeholder="Telefono">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="text-dark">Telefono (opcional)</label>
                        <input type="phone" class="form-control form-control-sm" name="opcional_telefono"
                            placeholder="Telefono ">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-outline-info  btn-sm " id="btnUpdatePropietario"
                            value="Enviar">
                        <button type="button" class="btn btn-outline-dark btn-sm " data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- </div> --}}
{{-- </div> --}}