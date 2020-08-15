@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
        <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark"> LMS-Laundry <small>Layanan Laundry Antar Jemput</small></h1> -->
        </div><!-- /.col -->
        <div class="col-sm-6">
            <!-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Layout</a></li>
            <li class="breadcrumb-item active">Top Navigation</li>
            </ol> -->
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Keranjang laundry Anda</h3>
                        </div>
                        <div class="card-body p-0"> 
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach($orders as $od)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{asset('public/dist/img/laundryorder.jpg')}}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">#{{$od->kode_orders}} ({{$od->nama_pelanggan}})
                                        <span class="badge badge-warning float-right">Rp. {{number_format($od->totalharga)}}</span></a>
                                        <span class="product-description">
                                            <a href="#modal-detail" id="detail" data-id="{{$od->kode_orders}}" data-action="detail" class="btn btn-success btn-xs detail btn-flat" title="Detail Laundry" data-toggle='modal'>
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="orderstatus/deleteorder/{{$od->kode_orders}}" id="delete" class="btn btn-danger btn-xs btn-flat" data-toggle='modal'>
                                                <i class="fas fa-times"></i>
                                            </a>
                                            <hr>

                                            @if($od->status_order==1)
                                            <p>Pelanggan Belum Memilih Metode Penerimaan Barang</p>                                   
                                            @elseif($od->status_order==2)
                                            @if($od->laundry_type=="SATUAN")
                                            <form method="post" action="dashboard/postsatuan">
                                            @csrf
                                                <input type="hidden" name="kodeorder" value="{{$od->kode_orders}}">
                                                <button type="submit" class="btn btn-primary btn-md btn-flat">Terima Barang</button>
                                            </form>
                                            @else
                                            <form method="post" action="dashboard/postkiloan">
                                            @csrf
                                            <input type="hidden" name="hargasatuan" class="form-control form-control-sm" value="{{$od->harga_satuan}}" placeholder="Timbang Pakaian"> 
                                            <input type="hidden" name="kodeorder" value="{{$od->kode_orders}}">
                                            
                                            <div class="input-group mb-3">
                                                <input type="text" name="qty" class="form-control form-control-sm" placeholder="Timbang Pakaian"> 
                                                <span class="input-group-append">
                                                    <button class="btn btn-xs btn-primary"><i class="fas fa-check-circle"></i>Lanjutkan</buton>
                                                </span>
                                            </div>
                                            </form>
                                            @endif
                                            @elseif($od->status_order==3)
                                            <form method="post" action="dashboard/postcuci">
                                            @csrf
                                                <input type="hidden" name="kodeorder" value="{{$od->kode_orders}}">
                                                <button type="submit" class="btn btn-danger btn-md btn-flat">Cuci Bersih</button>
                                            </form>
                                            @elseif($od->status_order==4)
                                            <form method="post" action="dashboard/postkering">
                                            @csrf
                                                <input type="hidden" name="kodeorder" value="{{$od->kode_orders}}">
                                                <button type="submit" class="btn btn-danger btn-md btn-flat">Pengeringan</button>
                                            </form>
                                            @elseif($od->status_order==5)
                                            <form method="post" action="orderstatus/poststrika">
                                            @csrf
                                                <input type="hidden" name="kodeorder" value="{{$od->kode_orders}}">
                                                <button type="submit" class="btn btn-primary btn-md btn-flat">Strika</button>
                                            </form>
                                            @elseif($od->status_order==6)
                                            <form method="post" action="orderstatus/postserahkan">
                                            @csrf
                                                <input type="hidden" name="kodeorder" value="{{$od->kode_orders}}">
                                                <button type="submit" class="btn btn-primary btn-md btn-flat">Serahkan Ke Pelanggan</button>
                                            </form>
                                            @endif
                                            <hr>
                                            <form method="post" action="orderstatus/postbayar">
                                            @csrf
                                                <input type="hidden" name="kodeorder" value="{{$od->kode_orders}}">
                                                <button type="submit" class="btn btn-success btn-md btn-flat">Bayar</button>
                                            </form>
                                        </span>
                                    </div>
                                </li>
                                <div class="modal fade" id="modal-detail">
                                    <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h4 class="modal-title">
                                        My Laundry
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <div id="fetched-data-order"></div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            @endforeach
                            </ul>
                        </div>
                    </div>                    
                </div>
            </div>        
        </div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){ 
        $('#modal-detail').on('show.bs.modal', function (e) {
        var kodeorder = $(e.relatedTarget).data('id');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : 'orderstatus/detailorder',
            data :  {kode:kodeorder},
            success : function(data){
                $('#fetched-data-order').html(data);//menampilkan data ke dalam modal
            }
        });
        });
    });

</script>
@endsection
