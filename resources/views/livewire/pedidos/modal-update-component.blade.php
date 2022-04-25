<div>
    <div class="card-description">
      <div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title col-11 text-center text-black" id="UpdateModalLabel">Actualización de Pedido</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Direccion de recogida</label>
                  <input type="text" class="form-control @error('direccion_recogida') is-invalid  @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="direccion_recogida">
                  <div id="emailHelp" class="form-text">Dirección donde el repartidor recogerá el paquete {{ $direccion_recogida }}<br>
                    @error('direccion_recogida') <span class="text-danger">{{ $message }}</span> @enderror
                   </div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Direccion de entrega</label>
                  <input type="text" class="form-control @error('direccion_entrega') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" wire:model="direccion_entrega">
                  <div id="emailHelp" class="form-text">Dirección donde el repartidor entregará el paquete {{ $direccion_entrega }}
                    <br>
                    @error('direccion_entrega') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
  
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Zonas de entrega</label>
                  <select class="form-select @error('zoneSelected') is-invalid  @enderror" wire:model="zoneSelected">
                    <option style="display:none;">Selecione la zona</option>
                    @foreach ($zones as $zone)
                    <option value="{{ $zone->id_zone }}">{{ $zone->nombre }}</option>
                    @endforeach
                  </select>
  
                  @error('zoneSelected') <span class="text-danger text-center">{{ $message }}</span> @enderror
                </div>
  
  
  
                <h3 class="mb-2 text-center text-black">Repartidores {{ $repartidor }}</h3>
                @error('repartidor') <span class="text-danger">{{ $message }}</span> @enderror
                @if ($zoneSelected <> null)
                  <div class="mb-3">
                    <div class="row">
                      @foreach ($deliveries as $deli)
                      <div class="col-sm-6">
                        <div class="card">
                          <div class="card-body text-center mx-center">
                            <h5 class="card-title">
                              <div class="form-floating mb-3">
                                <input type="radio" value="{{ $deli->id_repartidor }}" wire:model="repartidor">
                                {{ $deli->nombre }}
                              </div>
  
                            </h5>
                            <br>
                            <img src="{{ asset('admin/images/faces/profile.png') }}" class=" mb-2" width="125" height="125">
                            <p class="card-text">
                              <li>
                                Vehiculo: Motocicleta
                              </li>
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>                                   
                  @endif      
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" wire:click="store">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>
  
  @push('scripts')
      <script>
         $('#UpdateModal').on('hidden.bs.modal', function (e) {
               Livewire.emit('reset');
           })
           window.addEventListener('closeModal', event => {
           $("#UpdateModal").modal('hide');  
             
             
           }); 
  
  
      </script>
  @endpush
  
  
  