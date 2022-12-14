<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Penanggung Jawab') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ route('pj.create')}}" class="btn btn-primary mb-3">Tambah Data</a>
            <a href="{{ route('pj.restore')}}" class="btn btn-primary mb-3">Restore</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID PJ</th>
                            <th>Nama</th>
                            <th>NIP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->ID_PJ }}</td>
                                <td>{{ $data->NAMA_PJ }}</td>
                                <td>{{ $data->NIP_PJ }}</td>
                                <td>
                                    <a href="{{ route('pj.edit', $data->ID_PJ)}}"  class="btn btn-success btn-sm">Edit</a>
                                    <!-- Button trigger modal -->
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->ID_PJ }}">
                                    Delete
                                </button>
                                <a href="{{ route('pj.soft', $data->ID_PJ)}}"  class="btn btn-warning btn-sm">Soft Delete</a>
                                

                                <!-- Modal Delete-->
                                <div class="modal fade" id="hapusModal{{ $data->ID_PJ}}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="{{ route('pj.delete', $data->ID_PJ) }}">
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