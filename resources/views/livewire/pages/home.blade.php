<div class="container mx-auto p-6">
    @if ($this->saberes->count() > 0)
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Saberes</h2>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($this->saberes as $saber)
                    <livewire:components.saber-card :saber="$saber" :key="$saber->id" />
                @endforeach
            </div>
        </div>
    @else
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">No hay saberes registrados hasta el momento
                </h2>
            </div>
        </div>
    @endif
</div>
