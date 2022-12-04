<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mb-4 px-4">
            <form class = "row mt-3 ml-3 justify-content-center "action="" method="GET">
                <h2 class="text-center mb-1">Search</h2>
                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                <input class="w-50" type="text" name="search"/>
                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>Ruangan</th>
                            <th>Lantai</th>
                            <th>PJ</th>
                            <th>NIP PJ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->NAMA_BARANG }}</td>
                                <td>{{ $data->JUMLAH }}</td>
                                <td>{{ $data->NAMA_RUANGAN }}</td>
                                <td>{{ $data->LANTAI }}</td>
                                <td>{{ $data->NAMA_PJ }}</td>
                                <td>{{ $data->NIP_PJ }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
