<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">



            @forelse ($vacantes as $vacante)
            
                <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
                    <div class="space-y-3">
                        <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                            {{$vacante->titulo}}
                        </a>
                        <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
                        <p class="text-sm text-gray-500">Último dia: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
                    </div>

                    <div class="flex flex-col md:flex-row items-stretch gap-3  mt-5 md:mt-0">
                        <a href="{{route('candidatos.index', $vacante)}}"
                        class="bg-blue-900 py-2 px-4 my-2 rounded-lg text-white text-xs font-bold uppercase text-center">
                        
                        {{$vacante->candidatos->count()}}
                        Candidatos
                        </a>
                        <a href="{{route('vacantes.edit', $vacante->id)}}"
                        class="bg-yellow-900 py-2 px-4 my-2 rounded-lg text-white text-xs font-bold uppercase text-center">
                            Editar
                        </a>
                        <button
                            wire:click="$emit('mostrarAlerta', {{$vacante->id}})"
                            class="bg-red-900 py-2 px-4 my-2 rounded-lg text-white text-xs font-bold uppercase text-center">
                            Eliminar
                        </button>
                    </div>


                </div>

        

            @empty
                <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        
            @endforelse
        </div>

        <div class="mt-10">
            {{$vacantes->links()}}
    </div>
</div>

@push('scripts')
    {{-- <script>
        alert('Hola Mundo');
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        Livewire.on('mostrarAlerta', vacanteId =>{
            Swal.fire({
                title: "Eliminar Vacante",
                text: "Una vacante eliminada no se puede recuperar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, ¡Eliminar!",
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar la vacante
                Livewire.emit('eliminarVacante', vacanteId)
                Swal.fire({
                    title: "Se eliminó la Vacante",
                    text: "Eliminado Correctamente",
                    icon: "success"
                });
            }
            });
        })

       

    </script>
@endpush