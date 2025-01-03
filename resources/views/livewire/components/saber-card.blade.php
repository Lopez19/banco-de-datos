<div class="relative flex flex-col justify-between bg-white shadow-md rounded-lg overflow-hidden">

    @if ($saber?->media)
        <img src="/storage/{{ $saber?->media->path }}" alt="{{ $saber?->media->alt }}" class="object-cover w-full h-48">
    @else
        <img src="https://via.placeholder.com/300" alt="" class="object-cover w-full h-48" />
    @endif

    <div class="flex flex-col justify-between p-6 bg-white shadow-md">
        <div>
            <h3 class="text-lg font-semibold">{{ $saber->titulo }}</h3>
            <p class="mt-2 text-sm"><span class="font-semibold">Área temática:
                </span>{{ $saber->areaTematica->nombre }}</p>
            <p class="mt-2 text-sm text-gray-500"><span class="font-semibold">Autor:
                </span>{{ $saber->autor }}</p>
        </div>

        <div class="flex flex-wrap mt-4">
            @foreach (explode(',', $saber->palabras_clave) as $tag)
                <span
                    class="px-2 py-1 mt-2 mr-2 text-xs font-semibold text-blue-600 bg-blue-100 rounded-full">{{ $tag }}</span>
            @endforeach
        </div>

        <div class="mt-4">
            <a href="{{ route('saber.show', $saber) }}" wire:navigate
                class="text-sm font-semibold text-blue-600 hover:underline">Ver mas</a>
        </div>
    </div>
</div>
