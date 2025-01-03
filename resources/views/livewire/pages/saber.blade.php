<div class="container mx-auto p-4 space-y-4">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Saber</h1>
        <a href="{{ route('home') }}" wire:navigate class="text-blue-500 hover:underline">Volver</a>
    </div>

    <div class="bg-white p-4 sm:p-8 lg:p-12 shadow-md rounded-lg">
        <div class="overflow-hidden">
            <div class="flex flex-col lg:flex-row gap-4 lg:gap-8">
                <article class="prose lg:w-1/2 flex flex-col justify-center items-center lg:justify-start">
                    <h1>{{ $saber?->titulo }}</h1>

                    @if ($saber?->media)
                        <img src="/storage/{{ $saber?->media->path }}" alt="{{ $saber?->media->alt }}" />
                    @else
                        <img src="https://via.placeholder.com/300" alt="" />
                    @endif


                    <div class="w-full">
                        {{-- Palabras Clave --}}
                        <div class="flex flex-wrap gap-2 mt-4">
                            @foreach (explode(',', $saber?->palabras_clave) as $palabra)
                                <span class="bg-gray-200 px-2 py-1 rounded-full">{{ $palabra }}</span>
                            @endforeach
                        </div>

                        {{-- Fecha de Publicación --}}
                        <p class="text-sm">Publicado el {{ $saber?->created_at->format('d/m/Y') }}</p>

                        <div class="overflow-hidden">
                            {{-- Author --}}
                            <p>
                                <span class="font-bold">Autor: </span>
                                {{ $saber->autor }}
                            </p>
                            {{-- Area Tematica --}}
                            <p>
                                <span class="font-bold">Area Tematica: </span>
                                {{ $saber->areaTematica->nombre }}
                            </p>
                            {{-- Formato --}}
                            <p>
                                <span class="font-bold">Formato: </span>
                                {{ $saber->format->nombre }}
                            </p>
                            {{-- Link Adicional --}}
                            <p>
                                <span class="font-bold">Link Adicional: </span>
                                <a
                                    href="{{ $saber->enlace_adicional }}"target="_blank">{{ $saber->enlace_adicional }}</a>
                            </p>
                        </div>
                    </div>
                </article>

                <article class="prose ">
                    {!! $saber?->descripcion !!}
                </article>
            </div>
        </div>
    </div>
</div>
