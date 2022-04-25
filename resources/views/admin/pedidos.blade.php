@extends('admin.blank')


@section('content')

<div class="row">
  <div class="col-xl-3 d-flex grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between">
          <h4 class="card-title mb-3">Repartidores con mas entregas de tus paquetes</h4>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-sm-12">
                <div class="d-flex justify-content-between mb-4">
                  <div class="font-weight-medium">Repartidor</div>
                  <div class="font-weight-medium">Cantidad</div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                  <div class=" font-weight-medium">Connor Chandler</div>
                  <div class="small">$ 4909</div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                  <div class=" font-weight-medium">Russell Floyd</div>
                  <div class="small">$857</div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                  <div class=" font-weight-medium">Douglas White</div>
                  <div class="small">$612	</div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                  <div class=" font-weight-medium">Alta Fletcher </div>
                  <div class="small">$233</div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                  <div class=" font-weight-medium">Marguerite Pearson</div>
                  <div class="small">$233</div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                  <div class=" font-weight-medium">Leonard Gutierrez</div>
                  <div class="small">$35</div>
                </div>
                <div class="d-flex justify-content-between mb-4">
                  <div class=" font-weight-medium">Helen Benson</div>
                  <div class="small">$43</div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class=" font-weight-medium">Helen Benson</div>
                    <div class="small">$43</div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-9 d-flex grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Todos los pedidos</h4>
        @livewire('pedidos.modal-update-component')
        @livewire('pedidos.modal-pedido-component')
        <div class="table-responsive">
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th>Repartidor</th>
                <th>Dirección de recogida</th>
                <th>Dirección de entrega</th>
                <th>Estado</th>
                <th class="text-center" >Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($allp as $pedido)
              <tr>
                @php
                    $repartidor = DB::table('users')->select('name')->where('id',$pedido->id_usuario)->first();
                @endphp
                <td>
                  {{ $repartidor->name }}
                </td>
                <td>{{ $pedido->direccion_recogida }}</td>
                <td>{{ $pedido->direccion_entrega }}</td>
                <td>
                  @switch($pedido->estado)
                    @case(0)
                    <label class="badge badge-secondary">Pendiente de aceptación</label>
                    @break
                    @case(1)
                    <label class="badge badge-info">Pedido aceptado</label>
                    @break
                    @case(3)
                    <label class="badge badge-secondary">Pendiente de recogida</label>
                    @break
                    @case(4)
                    <label class="badge badge-info">Paquete recogido</label>
                    @break
                    @case(5)
                    <label class="badge badge-info">En proceso</label>
                    @break
                    @case(6)
                    <label class="badge badge-success">Entregado</label>
                    @break
                    @case(7)
                    <label class="badge badge-danger">Rechazado</label>
                    @break
                    @case(8)
                    <label class="badge badge-danger">No entregado</label>
                    @break
                  @endswitch                
                </td>
                <td class="text-center">
                  
                  <button type="button" class="btn" data-toggle="modal" data-target="#PedidoModal">
                    <i class="typcn typcn-edit mx-0 text-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i>
                  </button>
                  <button type="button" class="btn" >
                    <i class="typcn typcn-trash mx-0 text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"></i>
                  </button>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection


@push('scripts')
<script>
  $(document).ready( function () {
  $('#myTable').DataTable({
    "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
  });
  } );

  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
  })




  
</script>
@endpush