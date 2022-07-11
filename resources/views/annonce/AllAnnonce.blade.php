<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Annonce') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <table>
                        <thead>
                            <tr>
                                <td>Titre</td>
                                <td>Description</td>
                                <td>Photographie</td>
                                <td>Prix</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($annonces as $annonce)
                            <tr>
                                <td>{{ $annonce->titre }}</td>
                                <td>{{ $annonce->description }}</td>
                                <td>{{ $annonce->photographie }}</td>
                                <td>{{ $annonce->prix }}</td>
                                <td><a href="{{ url('/edit-annonce/'.$annonce->id)}}">Edit</a></td>
                                <td>
                                <form action="{{ url('/delete-annonce/'.$annonce->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit">Delete</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>