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
            <!-- <a href="{{ route('barang.restore')}}" class="btn btn-success mb-3">Restore Data</a> -->
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
                                <!-- Button trigger modal -->
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_BARANG }}">
                                    Delete
                                </button>
                                <button class="btn btn-warning btn-sm">
                                    <a href="{{ route('barang.soft', $data->ID_BARANG) }}">Soft delete</a>
                                </button>
                                <!-- Modal Delete-->
                                <div class="modal fade" id="hapusModal{{ $data->ID_BARANG}}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('barang.delete', $data->ID_BARANG) }}">
                                                @csrf
                                                @method("post")
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus data ini?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary bg-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <button  class="btn btn-primary">Ya</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>