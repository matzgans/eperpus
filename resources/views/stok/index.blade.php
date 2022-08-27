@extends('layout.admin')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection


@section('content')
        <main>
            <div class="container-fluid px-4">
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            Stok Buku
                        </h5>
                        <form action="/pinjam/store" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="judul" class="form-label">Judul Buku</label>
                                    <select class="form-select" id="judul" name="judul" aria-label="Default select example">
                                        <option selected>Pilih Buku</option>
                                        @foreach($data as $item)
                                            <option value="{{$item->id}}">{{$item->judul}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <fieldset disabled>
                                    <div class="col-md-12 mb-2">
                                        <label for="jumlah_peminjaman" class="form-label">Pengarang</label>
                                        <input type="text" name="pengarang" id="pengarang" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="number" name="stok" id="stok" class="form-control" >
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="tanggal_pwminjaman" class="form-label">Jumlah Halaman</label>
                                        <input type="text" name="tanggal_pwminjaman" id="jum_hal" class="form-control">
                                    </div>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
    $('#judul').change( function(){
        var id = $(this).val();
        var url = '{{route('lihat', ':id')}}';
        url = url.replace(':id', id);

        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',

            success: function(response){
                if(response != null){
                    $('#pengarang').val(response.pengarang);
                    $('#stok').val(response.stok);
                    $('#jum_hal').val(response.jum_halaman);
                }
            }

        });
    });
</script>
@endsection