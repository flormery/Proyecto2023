<x-app-layout>
    <div class="w-full h-[100px] bg-blue-950 flex justify-center items-center">
        <div
            class="ValidarInforme w-[449px] h-[50px] text-center text-white text-[40px] font-normal font-['Inter']">
           Asignar Supervisor
        </div>
    </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Nro</th>
                                        <th scope="col" class="px-6 py-4">Apellidos y Nombres</th>
                                        <th scope="col" class="px-6 py-4">Asignar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($practicantes as $practicante)
                                    @if ($practicante->supervisor == 'En proceso')
                                        <tr
                                            class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $practicante->id }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$practicante->nombre }}</td>

                                            <td>
                                                <button id="validar" type="button" class="button-with-icon"
                                                style="background-color: #28a745; color: white; margin-right: 10px; border: none; border-radius: 5px; padding: 8px 15px;"
                                                data-bs-toggle="modal" data-bs-target="#modalAsignarSupervisor">
                                                Asignar Supervisor
                                              </button>
                                            </td>

                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
<!-- Modal para elegir supervisor -->
<div class="modal fade" id="modalAsignarSupervisor" tabindex="-1" aria-labelledby="modalAsignarSupervisorLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAsignarSupervisorLabel">Elegir Supervisor</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Aquí puedes colocar opciones para elegir al supervisor -->
            <select id="selectSupervisor" class="form-select" aria-label="Seleccione un supervisor" required>
                <option value="">Seleccionar Empresa</option>
                @foreach ($docentes as $empresa)
                    <option value="{{$empresa->id}}">{{$empresa->nombre}}</option>
                @endforeach
            </select>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button id="guardarSupervisor" type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Agrega Bootstrap JavaScript (jQuery requerido) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Tu propio script para manejar la selección del supervisor -->
  <script>
    document.getElementById('guardarSupervisor').addEventListener('click', function() {
      // Obtener el supervisor seleccionado
      var supervisorSeleccionado = document.getElementById('selectSupervisor').value;

      // Aquí puedes realizar acciones con el supervisor seleccionado, como enviarlo al backend, etc.
      console.log('Supervisor seleccionado:', supervisorSeleccionado);

      // Cerrar el modal
      var modal = bootstrap.Modal.getInstance(document.getElementById('modalAsignarSupervisor'));
      modal.hide();
    });
  </script>
</x-app-layout>
