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
                                <button class="btn btn-danger btn-sm">
                                <a href="{{ route('pj.delete', $data->ID_PJ) }}">Delete</a>
                                </button>
                                <form class = "mt-1 form-inline" method="POST" action="{{ route('pj.soft', $data->ID_PJ) }}">
                                    @csrf
                                        <button onclick="return confirm('{{ __('Are you sure you want to destroy?') }}')" type="submit" class="btn btn-warning">Soft Delete</button>
                                </form>
                                </td>                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>