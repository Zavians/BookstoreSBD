<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('TABEL TRANSAKSI') }}
        </h2>
    </x-slot>

<div class="container mt-5">
    <form class = "row mt-3 ml-3 justify-content-center "action="" method="GET">
        <h2 class="text-center mb-1">Search Here</h2>
        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
        <input class="w-50" type="text" name="search" required/>
        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
    </form>
    <a href="{{ route("transaksi.index")}}" class="btn btn-primary btn-sm ml-1">Back</a>
    <div class="card mt-3">
        <div class="card-body">
            <table class="table">
                <thead>
                <th>ID_Buku</th>
                <th>Nama</th>
                <th>NamaKasir</th>
                <th>NamaPenerbit</th>
                <th>Judul</th>
                <th>Harga</th>
                </thead>
                <tbody>
                    @foreach ($transaksi as $no => $hasil)
                    <tr>
                    <td>{{$no+1}}</td>
                    <td>{{$hasil ->Nama}}</td>
                    <td>{{$hasil ->NamaKasir}}</td>
                    <td>{{$hasil ->NamaPenerbit}}</td>
                    <td>{{$hasil ->Judul}}</td>
                    <td>{{$hasil ->Harga}}</td>
                    <td>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

</x-app-layout>