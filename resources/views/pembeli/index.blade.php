@extends('master')
@section('title','Dashboard Pembeli')

@section('content')
    <style>
        .bdr{
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h2>Dashboard Pembeli</h2>
                    <form class="form-inline">
                        <a href="{{route('pembeli.create')}}" class="btn btn-primary">Tambah</a>
                    </form>
                </div>
                <div class="py-4">
                    @if (session()->has('message'))
                        <div class="my-3">
                            <div class="alert alert-success">
                                {{session()->get('message')}}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="table-responsive bdr " >
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr align="center">
                                <th>#</th>
                                <th>Kode Barang</th>
                                <th>Nama Pembeli</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Alamat Pembeli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pembelis as $pembeli)
                                <tr align="center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$pembeli->barang->kode_barang ?? 0}}</td>
                                    <td>{{$pembeli->nama_pembeli}}</td>
                                    <td>{{$pembeli->barang->nama_barang ?? 0}}</td>
                                    <td>{{$pembeli->barang->jumlah_barang ?? 0}}</td>
                                    <td>{{$pembeli->alamat}}</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="{{route('pembeli.edit', ['pembeli'=>$pembeli->id])}}" class="btn btn-warning btn-block" >Edit</a>
                                            <form action="{{route('pembeli.destroy', ['pembeli'=>$pembeli->id])}}" method="POST" class="ms-1">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="11">Tidak ada data...</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
