<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body>
    <x-app-layout>
        <div class="Desktop78 w-[1440px] h-[817px] relative bg-white">
            <div class="w-full h-[100px] bg-blue-950 flex justify-center items-center">
                <div
                    class="ValidarInforme w-[449px] h-[50px] text-center text-white text-[40px] font-normal font-['Inter']">
                    GESTIONAR INFORME
                </div>
            </div>

            <div
                class="Egresado w-[410px] h-[57px] left-[131px] top-[183px] text-center text-black text-[40px] font-normal font-['Inter']">
                PRACTICANTE</div>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full text-left text-sm font-light">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Nro</th>
                                        <th scope="col" class="px-6 py-4">Apellidos y Nombres</th>
                                        <th scope="col" class="px-6 py-4">Documento</th>
                                        <th scope="col" class="px-6 py-4">Validar Informe</th>
                                        <th scope="col" class="px-6 py-4">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($informes as $informe)
                                    @if ($informe->estado == 'En proceso')
                                        <tr
                                            class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $informe->id }}</td>
                                            <td class="whitespace-nowrap px-6 py-4">@php $practicante = \App\Models\Practicante::find($informe->practicante_id)@endphp
                                                {{ $practicante ? $practicante->nombre : 'Nombre no encontrado' }}</td>
                                            <td class="h-16 w-16 flex items-center justify-center">
                                                <button target="_blank" class="ml-8 mt-1 " id="openModal">
                                                    <i class="fa-solid fa-eye fa-2xl"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <button id="validar" type="submit" class="button-with-icon"
                                                    style="background-color: #28a745; color: white; margin-right: 10px; border: none; border-radius: 5px; padding: 8px 15px;">Aceptar</button>
                                                    <button id="rechazar" type="submit" class="button-with-icon"
                                                    style="background-color: #dc3545; color: white; border: none; border-radius: 5px; padding: 8px 15px;">
                                                    Rechazar
                                                  </button>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                {{ $informe->fecha }}
                                                <br>
                                                {{ now()->toDateString() }}
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
        </div>

        <div id="pdfModal" class="fixed inset-0 overflow-y-auto hidden bg-black bg-opacity-50">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-zinc-900 p-4 rounded-lg w-full max-w-2xl mx-auto">
                    <iframe id="pdfIframe" class="w-full h-96" src="" frameborder="0"></iframe>
                    <div class="mt-4 flex justify-end">
                        <button id="closeModal"
                            class="px-4 py-2 bg-blue-500 text-white rounded focus:outline-none">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('openModal').addEventListener('click', function() {
                document.getElementById('pdfIframe').src = '{{ route('ver-pdf', ['nombre' => 'informe']) }}';
                document.getElementById('pdfModal').classList.remove('hidden');
            });

            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('pdfModal').classList.add('hidden');
                document.getElementById('pdfIframe').src = '';
            });

            document.getElementById('closeModalButton').addEventListener('click', function() {
                document.getElementById('pdfModal').classList.add('hidden');
                document.getElementById('pdfIframe').src = '';
            });
        </script>
    </x-app-layout>
    <script>
        // Código para el botón "Aceptar"
        document.getElementById("validar").addEventListener("click", function() {
            Swal.fire({
                title: "¿Estás seguro de Validar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Validado!",
                        text: "Tu archivo ha sido validado.",
                        icon: "success"
                    });
                }
            });
        });
        document.getElementById('rechazar').addEventListener('click', function() {
      Swal.fire({
        title: 'Ingrese el motivo del rechazo',
        input: 'text',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        showLoaderOnConfirm: true,
        preConfirm: (comment) => {
          return new Promise((resolve) => {
            fetch('/guardar-comentario', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Asegúrate de enviar el token CSRF en la solicitud
              },
              body: JSON.stringify({ comment: comment })
            })
            .then(response => {
              if (!response.ok) {
                throw new Error('Network response was not ok.');
              }
              return response.json();
            })
            .then(data => {
              console.log(data);
              resolve();
            })
            .catch(error => {
              console.error('Error:', error);
              resolve();
            });
          });
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then((result) => {
        Swal.fire({
          title: 'Rechazado con éxito',
          icon: 'success'
        });
      });
    });
    </script>
</body>

</html>
