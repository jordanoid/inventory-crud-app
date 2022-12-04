<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit PJ') }}
        </h2>
    </x-slot>
    <div class="card">
            <div class="card-body">
                <form action="{{ route('pj.update', $data->ID_PJ)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="id_pj" class="form-label">ID PJ</label>
                      <input type="text" class="form-control" name="id_pj" value ="{{$data->ID_PJ}}" id="id_pj">
                    </div>

                    <div class="mb-3">
                      <label for="nama_pj" class="form-label">Nama pj</label>
                      <input type="text" class="form-control" name="nama_pj" value ="{{$data->NAMA_PJ}}" id="nama_pj">
                    </div>

                    <div class="mb-3">
                        <label for="nip_pj" class="form-label">NIP PJ</label>
                        <input type="text" class="form-control" name="nip_pj" value ="{{$data->NIP_PJ}}" id="nip_pj">
                    </div>
                    
                    <button type="submit" class="btn btn-primary float-end">Edit</button>
                  </form>
            </div>
        </div>
</x-app-layout>