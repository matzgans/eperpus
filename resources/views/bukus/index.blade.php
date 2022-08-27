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
                            Data Buku
                        </h5>
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Buku 
                            <i class="fas fa-book-medical"></i>
                        </button>
                        <a href="" class="btn"></a>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>Judul Buku</th>
                                    <th>Pengarang</th>
                                    <th>Jumlah Halaman</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->judul}}</td>
                                        <td>{{$item->pengarang}}</td>
                                        <td>{{$item->jum_halaman}}</td>
                                        <td>{{$item->stok}} Buku</td>
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
                                <form action="/buku/store" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="judul" class="form-label">Judul Buku</label>
                                            <input type="text" name="judul" id="judul" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="pengarang" class="form-label">Pengarang Buku</label>
                                            <input type="text" name="pengarang" id="pengarang" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
                                            <input type="number" name="jum_halaman" id="jumlah_halaman" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="stok" class="form-label">Stok</label>
                                            <input type="number" name="stok" id="stok" class="form-control">
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
@endsection