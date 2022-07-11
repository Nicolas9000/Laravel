<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Annonce') }}
        </h2>
    </x-slot>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('search-annonce') }}" method="GET">
                        
                            <input type="text" name="search-titre" placeholder="Titre"/>
                            <input type="text" name="search-description" placeholder="Description"/>
                            <button type="submit">Search</button>
                        
                    </form>

                    <form action="{{ route('search-annonce') }}" method="GET">

                        <button name="submit" value="récent" type="submit">Annonces les plus récentes</button>
                    
                </form>

                    <div class="p-6 bg-white border-b border-gray-200">
                    
                        @if($posts->isNotEmpty())
                        <table>
                            <thead>
                                <tr>
                                    <td>Titre</td>
                                    <td>Description</td>
                                    <td>Photographie</td>
                                    <td>Prix</td>
                                </tr>
                            </thead>
                            @foreach ($posts as $post)
                                <div class="post-list">
                                        <tbody>
                                            <tr>
                                                <td>{{ $post->titre }}</td>
                                                <td>{{ $post->description }}</td>
                                                <td>{{ $post->photographie }}</td>
                                                <td>{{ $post->prix }}</td>
                                            </tr>
                                        </tbody>
                                        
                                    </div>
                                    @endforeach
                                </table>
                        @else 
                        <div>
                     <h2>No posts found</h2>
                     </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>