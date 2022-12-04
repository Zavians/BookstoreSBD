<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TABEL BUKU') }}
        </h2>
    </x-slot>

<div class="container mt-5">
    <a href="{{ route("buku.create")}}" class="btn btn-primary mb-3">Tambah Data</a>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <th>ID_Buku</th>
                <th>Judul</th>
                <th>Harga</th>
                <th>NamaPenerbit</th>
                <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($buku as $no => $hasil)
                    <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$hasil ->Judul}}</td>
                    <td>{{$hasil ->Harga}}</td>
                    <td>{{$hasil ->NamaPenerbit}}</td>
                    <td>
                        <a href="{{ route("buku.edit", $hasil->id)}}"  class="btn btn-success btn-sm">Edit</a>
                        <!-- Button trigger modal -->
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $hasil->id }}">
                        Hapus
                    </button>
                    <form class = "mt-1 form-inline" method="POST" action="{{ route('buku.soft', $hasil->id) }}">
                        @csrf
                            <button onclick="return confirm('{{ __('Are you sure you want to destroy?') }}')" type="submit" class="btn btn-warning">Hapus Bentar</button>
                    </form>
                    

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $hasil->id}}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('buku.destroy', $hasil->id) }}">
                                    @csrf
                                    @method("delete")
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