@extends('admin.blank')


@section('content')

<div class="row">
  
  <div class="col-lg-9 d-flex grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Mis Pedidos</h4>
        
        @livewire('repartidores.pedidos-component')
        <div class="table-responsive">
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th>Comerciante</th>
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