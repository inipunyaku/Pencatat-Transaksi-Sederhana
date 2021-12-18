@extends('layout.layout')
@section('content')
    <div class="container">

        <h3 class="mt-4 pt-2">Keranjang</h3>
        <table class="mt-3 table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>harga</th>
                    <th>Jumlah Barang</th>
                    <th>jumlah harga</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $total=0;
                    @endphp
                    @if (is_array($cart)||is_object($cart))
                        @foreach ($cart as $ct => $item)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $item['namabarang'] }}</td>
                            <td>{{ $item['hargabarang'] }}</td>
                            <td>{{ $item['jumlahbarang'] }}</td>
                            @php
                                $harga= $item['hargabarang'];
                                $jumlah= $item['jumlahbarang'];
                                $jumlahharga = $harga*$jumlah;
                                $total+=$jumlahharga;
                            @endphp
                            <td>{{ $jumlahharga }}</td>
                            <td><a href="{{ url('/cart/hapus/'.$ct) }}" class="btn btn-danger">hapus</a></td>
                            
                        </tr>
                        @endforeach   
                        @else
                        <tr><td colspan="6" align="center">- DATA KOSONG -</td></tr>      
                    @endif

                   
                </tbody>
        </table>

        <table class="table mt-5">
            <tr>
                <th>Total</th>
                <td>{{ $total }}</td>
            </tr>
                @php
                    if($total>=50000){
                        $diskon=$total*0.1;
                        $totalharga=$total-($total*0.1);
                        echo "
                        <tr>
                        <th>Diskon</th>
                        <td>$diskon</td>
                        </tr>
                        <tr>
                            <th>total setelah diskon</th>
                            <td>$totalharga</td>
                        </tr>";
                    }
                    else {
                        $diskon=0;
                        $totalharga=$total;
                    }
                @endphp
                
            <tr>
                <form action="/inputtransaksi" method="post" enctype="multipart/form-data" >
                @csrf
                {!! Form::hidden('totalsebelumdiskon', $total) !!}
                {!! Form::hidden('diskon', $diskon) !!}
                {!! Form::hidden('totalharga', $totalharga) !!}
                <th>Nama Pemesan</th>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <th>Tanggal Pemesanan</th>
                <td><input type="date" name="tgl" id="tgl"></td>
            </tr>
            <tr>
                <td></td>
                <td align="right">
                    <a href="/forgetcart" class="btn btn-danger">Hapus Semua</a>
                    <button type="submit" class="btn btn-primary">pesan</button>
                </td>
            </tr>
            </form>
        </table>
    </div>
@endsection