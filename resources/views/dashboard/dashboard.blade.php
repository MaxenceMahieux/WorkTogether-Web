<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Vos services</h2>
                    <table>
                        <tr>
                            <th>Bay</th>
                            <th>Rack</th>
                            <th>Nom</th>
                            <th>Date d'expiration</th>
                            <th>Options</th>
                        </tr>
                        @foreach ($allracksinfo as $rack)
                            <tr style="background: {{ $rack->rack_color }};">
                                <td>{{ $rack->bay_id }}</td>
                                <td>U{{ $rack->rack_id }}</td>
                                <td>{{ $rack->rack_name }}</td>
                                <td>{{ $rack->end_date }}</td>
                                <td><a href="{{ route('editrack', ['id' => $rack->id]) }}">🛠️</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
