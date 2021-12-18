@extends('layout.layout')
@section('content')
    <div class="container">

        <h3 class="mt-4 pt-2">Seluruh Transaksi</h3>
        <table class="mt-3 table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>No</th>
                    <th>Uid Transaksi</th>
                    <th>Nama Pembeli</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total sebelum diskon</th>
                    <th>diskon</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                        @foreach ($ambil as $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item->uidtransaksi }}</td>
                            <td>{{ $item->namapembeli}}</td>
                            <td>{{ $item->tanggalpembelian }}</td>
                            <td>{{ $item->totalsebelumdiskon }}</td>
                            <td>{{ $item->diskon }}</td>
                            <td>{{ $item->totalharga }}</td>
                            <td><a href="/detail/{{ $item->uidtransaksi }}" class="btn btn-success">Detail</a></td>
                        </tr>
                        @endforeach                   
                </tbody>
        </table>
    </div>
@endsection