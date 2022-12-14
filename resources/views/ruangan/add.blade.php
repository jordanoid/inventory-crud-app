<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Ruangan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-4 px-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('ruangan.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                            <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                            <input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan">
                            </div>

                            <div class="mb-3">
                                <label for="lantai" class="form-label">Lantai</label>
                                <input type="text" class="form-control" name="lantai" id="lantai">
                            </div>

                            <div class="mb-3">
                                <label for="id_pj" class="form-label">ID PJ</label>
                                <select name="id_pj" class="form-control">
                                    <option>Select PJ</option><!--selected by default-->
                                    @foreach($datas2 as $data2)
                                        <option id="id_pj">
                                            {{ $data2->ID_PJ}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                                
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>