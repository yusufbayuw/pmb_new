<div class="pt-6 md:pt-10 lg:pt-12">
    <div class="text-center">
        <h1 class="text-balance text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Form Pendaftaran</h1>
    </div>
    <div class="p-6 md:px-10 md:pb-10 lg:px-16 lg:pb-16">
        <form wire:submit="create">
            {{ $this->form }}
            
            <div class="pt-6 flex flex-col">
                <button class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-md md:text-lg font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" type="submit">
                    Kirim Pendaftaran
                </button>
            </div>
        </form>
        
        <x-filament-actions::modals />
    </div>
</div>
