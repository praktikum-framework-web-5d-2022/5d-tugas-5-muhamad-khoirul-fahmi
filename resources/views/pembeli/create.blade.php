@extends('master')
@section('title','Tambah Data')

@section('content')
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Data</h2>
                <p>Silahkan masukkan data dengan benar dan lengkap!</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('pembeli.store')}}" method="POST">
                    @csrf
                    <div class="form-row py-4">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="kode_barang" class="form-label">Kode barang</label>
                                    <input type="text" name="kode_barang" id="kode_barang" placeholder="Masukkan Kode Barang" class="form-control" value="{{old('kode_barang')}}">
                                    @error('kode_barang')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                    <div class="col">
                                    <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                                    <input type="text" name="nama_pembeli" id="nama_pembeli" placeholder="Masukkan Nama Pembeli" class="form-control" value="{{old('nama_pembeli')}}">
                                    @error('nama_pembeli')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col my-3">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang" class="form-control" value="{{old('nama_barang')}}">
                                    @error('nama_barang')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col my-3">
                                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                                    <input type="text" name="jumlah_barang" id="jumlah_barang" placeholder="Masukkan Jumlah Barang" class="form-control" value="{{old('jumlah_barang')}}">
                                    @error('jumlah_barang')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label for="alamat" class="form-label">Alamat Pembeli</label>
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Pembeli">{{old('alamat')}}</textarea>
                                @error('alamat')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="d-flex flex-row-reverse py-3">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
