<div class="card">
    <div class="card-header">
        <h3 class="card-title">Order Number #{{$kode}}</h3>
    </div>
    <div class="card-body p-0">
        <ul class="products-list product-list-in-card pl-2 pr-2">
            @foreach($myorder as $mo)
            <li class="item">
                <div class="product-img">
                    <img src="{{asset('public/dist/img/laundryorder.jpg')}}" alt="Product Image" class="img-size-50">
                </div>
                <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">{{$mo->jenis_order}}
                    <span class="badge badge-warning float-right">Rp. {{number_format($mo->harga_satuan)}}</span></a>
                    <span class="product-description">
                    Jumlah Order : {{$mo->qty}}, <strong>Total : {{number_format($mo->total_harga)}}</strong>
                    </span>
                </div>
            </li>
            @endforeach
            
            @foreach($myinv as $mi)
            <li class="item">
                <div class="product-img">
                    <img src="{{asset('public/dist/img/laundryorder.jpg')}}" alt="Product Image" class="img-size-50">
                </div>
                <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Total Yang Harus Di Bayar
                    <span class="badge badge-danger float-right">Rp. {{number_format($mi->total_pembayaran)}}</span></a>
                    <span class="product-description">
                    Status : 
                    @if($mi->status=='1')
                        <h6 class="text-red"><strong>Belum Lunas</strong></h6>
                    @else
                        <h6 class="text-green"><strong>LUNAS</strong></h6>
                    @endif
                    </span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>