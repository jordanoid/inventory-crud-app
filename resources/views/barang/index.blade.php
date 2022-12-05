<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ route('barang.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
            <a href="{{ route('barang.restore')}}" class="btn btn-success mb-3">Restore Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Barang</th>
                            <th>Jumlah</th>
                            <th>ID Ruangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->ID_BARANG }}</td>
                                <td>{{ $data->NAMA_BARANG }}</td>
                                <td>{{ $data->JUMLAH }}</td>
                                <td>{{ $data->ID_RUANGAN }}</td>
                                <td>
                                    <a href="{{ route('barang.edit', $data->ID_BARANG)}}"  class="btn btn-success btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm">
                                <a href="{{ route('barang.delete', $data->ID_BARANG) }}">Delete</a>
                                </button>
                                <button class="btn btn-warning btn-sm">
                                    <a href="{{ route('barang.soft', $data->ID_BARANG) }}">Soft delete</a>
                                </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>