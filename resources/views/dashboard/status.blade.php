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
                    <h2>Etat des services</h2>
                    <table id="etatServicesTable">
                        <tr>
                            <th>Bay</th>
                            <th>Etat</th>
                            <th>Informations</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('{{ route('apistatus') }}')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('etatServicesTable');
                    data.forEach(service => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${service.bay_id}</td>
                            <td>Maintenance</td>
                            <td>${service.info}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des données :', error));
        });
    </script>
</x-app-layout>
