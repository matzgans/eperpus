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
                            Peminjaman Buku
                        </h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Pinjam
                        </button>
                        <a href="" class="btn"></a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul Buku</th>
                                    <th>Jumlah Peminjaman</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pemgembalian</th>
                                    <th>Kembalikan</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pinjam as $item)
                                <tr>
                                    <td>{{$item->buku->judul}}</td>
                                    <td>{{$item->jum_peminjaman}}</td>
                                    <td>{{$item->tanggal_peminjaman}}</td>
                                    <td>
                                        @if($item->tanggal_pengembalian != NULL)
                                            {{$item->tanggal_pengembalian}}
                                        @else
                                        -- Belum Dikembalikan --
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/pinjam/{{$item->id}}/kembali" class="btn btn-success btn-sm">Kembalikan</a>
                                    </td>
                                    <td>{{$item->denda}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/pinjam/store" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="judul" class="form-label">Judul Buku</label>
                                            <select class="form-select" id="judul" name="judul" aria-label="Default select example">
                                                <option selected>Pilih Buku</option>
                                                @foreach($buku as $item)
                                                    <option value="{{$item->id}}">{{$item->judul}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jumlah_peminjaman" class="form-label">Jumlah Peminjaman</label>
                                            <input type="number" name="jum_peminjaman" id="jum_peminjaman" class="form-control">
                                        </div>
                                        <fieldset disabled class="col-md-6">
                                                <label for="stok" class="form-label">Stok</label>
                                                <input type="number" name="stok" id="stok" class="form-control" >
                                        </fieldset>
                                        <div class="col-md-12 mb-2">
                                            <label for="tanggal_pwminjaman" class="form-label">Tanggal peminjaman</label>
                                            <input type="date" name="tanggal_peminjaman" id="tanggal_pwminjaman" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        $('#judul').change(function() {
            var id = $(this).val();
            var url = '{{ route('auto', ':id') }}';
            url = url.replace(':id', id);

            $.ajax({
                url : url,
                type : 'get',
                dataType : 'json',
                success: function(response) {
                    if(response != null){
                        $('#stok').val(response.stok);
                    }
                }
            });
        });
    </script>
@endsection