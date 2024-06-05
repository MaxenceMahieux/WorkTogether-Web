<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Modification dus Serveur : {{ $id }} </h1>
                    @csrf
                    <form action="{{ route('editracksave', ['id' => $id]) }}" method="post"
                        style="display: block; width: 200px; margin: 0 auto;">
                        @csrf
                        <input type="color" name="color" id="head" value="{{ $info[0]->rack_color }}" />
                        <input type="text" name="info" value="{{ $info[0]->rack_name }}">
                        <button type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
