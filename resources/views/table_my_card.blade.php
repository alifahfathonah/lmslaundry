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
                            @foreach($mycard as $mc)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{asset('public/dist/img/laundryorder.jpg')}}" alt="Product Image" class="img-size-50">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">#{{$mc->kode_orders}}
                                        <span class="badge badge-warning float-right">Rp. {{number_format($mc->totalharga)}}</span></a>
                                        <span class="product-description">
                                            <a href="#modal-detail" id="detail" data-id="{{$mc->kode_orders}}" data-action="detail" class="btn btn-success btn-xs detail btn-flat" title="Detail Laundry" data-toggle='modal'>
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="orderstatus/deleteorder/{{$mc->kode_orders}}" id="delete" class="btn btn-danger btn-xs btn-flat" data-toggle='modal'>
                                                <i class="fas fa-times"></i>
                                            </a>
                                            <hr>
                                            @if($mc->status_order==1)
                                            <form method="post" action="orderstatus/postorder">
                                            @csrf
                                                <input type="hidden" name="kodeorder" value="{{$mc->kode_orders}}">
                                                <input type="hidden" name="total" value="{{$mc->totalharga}}">
                                                <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                                                <input type="hidden" name="username" value="{{Auth::user()->name}}">
                                                <div class="input-group mb-3">
                                                    <select class="form-control" name="delivery" id="delivery">
                                                        <option value="0">Delivery</option>
                                                        <option value="ANTAR">Antar</option>
                                                        <option value="JEMPUT">Jemput</option>
                                                    </select> 
                                                    <span class="input-group-append">
                                                        <button class="btn btn-xs btn-primary"><i class="fas fa-check-circle"></i>Lanjutkan</buton>
                                                    </span>
                                                </div>
                                            </form>                                    
                                            @elseif($mc->status_order==2)
                                            <a href="#modal-detail" id="Invoice" data-id="{{$mc->kode_orders}}" data-action="Invoice" class="btn btn-primary btn-xs Invoice btn-flat" title="Invoice Laundry" data-toggle='modal'>
                                            <i class="fas fa-file-invoice-dollar"></i> INVOICE
                                            </a>
                                            @endif
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
