@extends('layout.layout')
@section('content')
    <div class="container">
        <h1 class="mt-4 pt-2">Pilih Barang</h1>
        <table class="mt-3 table table-striped table-inverse table-responsive">
            <thead class="thead-inverse ">
                <tr>
                    <th>No</th>
                    <th>id barang</th>
                    <th>nama barang</th>
                    <th>harga</th>
                    <th>jumlah</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($ambil as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->uidbarang }}</td>
                            <td>{{ $item->namabarang }}</td>
                            <td>{{ $item -> hargabarang}}</td>
                            <form action="/insertcart" method="post" enctype="multipart/form-data">
                            @csrf 
                            {!! Form::hidden('id', $item->uidbarang) !!}
                            <td>
                              <input type="number" class="form-control" name="jumlah" id="jumlah" >
                            </td>
                            <td> <button type="submit" class="btn btn-success">Tambah</button></td>
                            </form>
                        </tr>
                    @endforeach

                </tbody>
        </table>
    </div>
@endsection