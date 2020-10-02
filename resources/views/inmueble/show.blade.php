@extends('layouts.app')
@prepend('styles')
@section('content')

<section class="section-pagetop">
  <div class="container clearfix">
    <h3 class="title-page ">Detalles de inmueble</h3>
  </div>
</section>

<section class="section-content ">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="row no-gutters justify-content-center align-items-center minh-100">
            <aside class="col-sm-5 border-right ">
              <div class="col-lg-12">
                <div>
                  <img id="portada" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
                </div>
              </div>

              <div class="my-2 text-center">

                <button class="btn  btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-sm"
                  data-backdrop="false"> <i class="fas fa-pen"></i> Actualizar </button>

              </div>

            </aside>
            <aside class="col-sm-7">
              <article class="p-5">

                <h4 class="title mb-3 font-weight-bold text-secondary"> {{ strtoupper($inmueble['tipo']) }} </h4>
                <small class="title mb-3">Cod : {{ $inmueble['codigo'] }} </small>

                <div class="mb-3">
                  <var class="price h3 text-warning">
                    <span class="currency">Cop $</span><span
                      class="num">{{ ($inmueble['proposito'] == 'arrendamiento') ? $inmueble['canon'] : $inmueble['precio'] }}</span>
                  </var>
                  <span> {{($inmueble['proposito'] == 'arrendamiento') ? '/Canon' : '/Precio venta'}}</span>
                </div>
                <div>
                  <span>Description</span>
                  <span>
                    <p class="text-justify">{{ $inmueble['descripcion'] }} </p>
                  </span>
                </div>

                <div class="col-md-12">
                  <div class="card">
                    <div class="card text-left">
                      <table class="table table-responsive">
                        <tr>
                          <td class="col-sm-3 " scope="row">
                            Propietario
                          </td>
                          <td class="col-sm-3" scope="row">
                            {{ $inmueble['propietario']['nombre']  . $inmueble['propietario']['apellido'] }}
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-3 " scope="row">
                            Proposito
                          </td>
                          <td class="col-sm-3" scope="row">
                            {{ $inmueble['proposito'] }}
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-3 " scope="row">
                            Habitaciones
                          </td>
                          <td class="col-sm-3" scope="row">
                            {{ $inmueble['habitaciones'] }}
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6" scope="row">
                            Cuidad
                          </td>
                          <td class="col-sm-6" scope="row">
                            {{ $inmueble['ciudad'] }}
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6" scope="row">
                            Direción
                          </td>
                          <td class="col-sm-6" scope="row">
                            {{ $inmueble['direccion'] }}
                          </td>
                        </tr>

                      </table>
                    </div>
                  </div>
                </div>

                <div class="my-2 text-center">
                  {{-- <button class="btn  btn-outline-primary" (click)="activate()"> <i class="fas fa-pen"></i> Actualizar --}}
                  </button>
                </div>
              </article>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section-content padding-y-sm bg">
  <div class="container">
    <div class="section-heading heading-line">
      <h4 class="title-section card py-2">Galeria
        <button class="btn  btn-outline-primary" data-toggle="modal" data-target=".bd-example-modal-lg"
          data-backdrop="false"> <i class="fas fa-plus"></i></button>
      </h4>
    </div>

    <div class="row" id="rowGallery"></div>

  </div>

</section>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.3);">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text text-dark">Agregar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>

      <form id="uploadGalleryForm" action="{{route('imagenes.store')}}" method="post" enctype=" multipart/form-data">
        <div class="wrapper">


          <input type="file" name="image" id="fileGallery" />
          <label for="fileGallery" class="btn-1">upload file</label>

          <input type="hidden" name="id" value="{{$inmueble['id']}}">

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger text-white" id="uploadGalleryBtn">Acceptar</button>
          <button type="button" style="display: inline-block;" id="cancelGalleryBtn"
            class="btn btn-secondary text-white" data-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
  aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.3);">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text text-dark">Actualizar portada</h5>
        <button type="button" class="close" data-dismiss="modal2" aria-label="Close">
        </button>
      </div>

      <form id="uploadPortadaForm" action="{{route('upload.portada')}}" method="post" enctype=" multipart/form-data">
        <div class="wrapper">


          <input type="file" name="image" id="filePortada" />
          <label for="filePortada" class="btn-1">upload file</label>

          <input type="hidden" name="id" value="{{$inmueble['id']}}">

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger text-white" id="uploadPortadaBtn">Acceptar</button>
          <button type="button" style="display: inline-block;" id="cancelPortadaBtn"
            class="btn btn-secondary text-white" data-dismiss="modal">Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>



@endsection
@push('scripts')
<script>
  const inmueble = @json($inmueble['id']);
</script>
<script src="{{ asset('apis/inmuebleshow.js') }} "></script>

@endpush