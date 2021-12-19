@extends('layout.layout')
@section('content')
    <div class="container">

        <h3 class="mt-4 pt-2">Detail Transaksi</h3>
        <table class="mt-3 table table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Uid Transaksi</th>
                    <th>Nama Pembeli</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total sebelum diskon</th>
                    <th>diskon</th>
                    <th>Total Harga</th>
                </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $transaksi['ambil2']->uidtransaksi }}</td>
                            <td>{{ $transaksi['ambil2']->namapembeli}}</td>
                            <td>{{ $transaksi['ambil2']->tanggalpembelian }}</td>
                            <td>{{ $transaksi['ambil2']->totalsebelumdiskon }}</td>
                            <td>{{ $transaksi['ambil2']->diskon }}</td>
                            <td>{{ $transaksi['ambil2']->totalharga }}</td>
                        </tr>                 
                </tbody>
        </table>

        <h3 class="mt-4 pt-2">Detail item</h3>
        <table class="mt-3 table table-responsive">
            <thead class="thead-inverse">
                <tr>
                   
                        
                    
                    <th>Uid Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jumlah Beli</th>
                    <th>SubTotal</th>
                </tr>
                </thead>
                <tbody>
                     @foreach ($detail['ambil'] as $item)
                     
                        <tr>
                            <td>{{ $item->uidbarang }}</td>
                            <td>{{ $item->namabarang}}</td>
                            <td>{{ $item->hargabarang }}</td>
                            <td>{{ $item->jumlahbeli }}</td>
                            @php
                            $subtotal = 0;
                                $harga=$item->hargabarang;
                                $jumlah=$item->jumlahbeli;
                                $subtotal=$harga*$jumlah;
                            @endphp
                            <td>{{ $subtotal }}</td>
                        </tr>  
                    @endforeach               
                </tbody>
        </table>
    </div>
@endsection