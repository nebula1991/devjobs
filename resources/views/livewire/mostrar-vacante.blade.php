<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-yellow-600 my-3">
            {{$vacante->titulo}}
        </h3>

        <div class="md:grid md:grid-cols-2 p-2 my-10">
            <p class="font-bold text-sm uppercase text-gray-200 my-3">Empresa:
                <span class="normal-case font-normal">{{$vacante->empresa}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-200 my-3">Último dia para presentarse:
                <span class="normal-case font-normal">{{$vacante->ultimo_dia->toFormattedDateString()}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-200 my-3">Categoria:
                <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-200 my-3">Salario:
                <span class="normal-case font-normal">{{$vacante->salario->salario}}</span>
            </p>

        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/' . $vacante->imagen)}}" alt="{{'Imagen vacante' . $vacante->titulo}}">
        </div>

        <div class="md:col-span-4 text-yellow-600">
            <h2 class="text-2xl font-bold mb-5">Descripción del Puesto</h2>
            <p>{{$vacante->descripcion}}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Deseas presentarte para esta vacante? 
                <a class="font-bold text-indigo-800" href="{{route('register')}}"> 
                    Obtén una cuenta y aplica a esta y otras vacantes
                </a>
            </p>
        </div>
    @endguest
      
    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot
    

</div>
