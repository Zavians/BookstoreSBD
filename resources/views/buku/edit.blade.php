<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Data Buku</h1>
        <a href="{{ route("buku.index")}}" class="btn btn-primary mb-3">Data Buku</a>
        @if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route("buku.update", $buku->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                      <label for="Judul" class="form-label">Judul</label>
                      <input type="text" class="form-control" name="Judul" value ="{{$buku->Judul}}" id="Judul">
                    </div>

                    <div class="mb-3">
                        <label for="Harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="Harga" value ="{{$buku->Harga}}" id="Harga">
                      </div>

                      <div class="mb-3">
                        <label for="NamaPenerbit" class="form-label">NamaPenerbit</label>
                        <input type="text" class="form-control" name="NamaPenerbit" value ="{{$buku->NamaPenerbit}}" id="NamaPenerbit">
                      </div>
                    
                    <button type="submit" class="btn btn-primary float-end">Edit</button>
                  </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>