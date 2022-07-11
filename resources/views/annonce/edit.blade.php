<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Annonce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ url('update-annonce/'.$annonce->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-label for="titre" :value="__('Titre')" />
            
                            <x-input id="titre" class="block mt-1 w-full" type="text" name="titre" :value="$annonce->titre" required autofocus />
                        </div>
                        <div>
                            <x-label for="description" :value="__('Description')" />
            
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$annonce->description" required autofocus />
                        </div>
                        <div>
                            <x-label for="photographie" :value="__('Photographie')" />
            
                            <x-input id="photographie" class="block mt-1 w-full" type="text" name="photographie" :value="$annonce->photographie" required autofocus />
                        </div>
                        <div>
                            <x-label for="prix" :value="__('Prix')" />
            
                            <x-input id="prix" class="block mt-1 w-full" type="text" name="prix" :value="$annonce->prix" required autofocus />
                        </div>
                        <x-button class="ml-3">{{ __('Update Annonce') }}</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>