<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @method('PUT')
                        @csrf
                        <div>
                            <label for="name">Enter your name: </label>
                            <input type="text" name="name" id="name">
                          </div>
                        <div>
                          <label for="email">Enter your email: </label>
                          <input type="email" name="email" id="email">
                        </div>
                        <div>
                            <label for="password">New password: </label>
                            <input type="password" name="password" id="password">
                          </div>
                          <div>
                            <button type="submit">UPDATE</button>
                          </div>
                    </form>

                    <form method="POST" action="{{ route('profile.delete') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">DELETE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
