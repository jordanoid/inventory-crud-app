<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Barang') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('barang.update', $data->ID_BARANG)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="id_barang" class="form-label">ID Barang</label>
                                <input type="text" class="form-control" name="id_barang" value ="{{$data->ID_BARANG}}" id="id_barang">
                            </div>

                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" value ="{{$data->NAMA_BARANG}}" id="nama_barang">
                            </div>

                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="text" class="form-control" name="jumlah" value ="{{$data->JUMLAH}}" id="jumlah">
                            </div>

                            <div class="mb-3">
                                <label for="id_ruangan" class="form-label">ID ruangan</label>
                                <input type="text" class="form-control" name="id_ruangan" value ="{{$data->ID_RUANGAN}}" id="id_ruangan">
                            </div>
                            
                            <button type="submit" class="btn btn-primary float-end">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>