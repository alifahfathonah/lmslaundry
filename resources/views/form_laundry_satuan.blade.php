@php
function acak($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWQYZ1234567890';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
    $pos = rand(0, strlen($karakter)-1); 
    $string .= $karakter[$pos];
    }
    return $string;
}   
$code = acak(2)."".date("dm");
@endphp

<form method="POST" action="createlaundrysatuan">
@csrf
<input type="hidden" name="kode" id="kode" value="{{$code}}">
<input type="hidden" name="persnm" id="persnm" value="{{Auth::user()->name}}">
<input type="hidden" name="typeorder" id="typeorder" value="SATUAN">

<table id="laundrysatuan" class="table table-sm">
    <tbody>
        @foreach($laundrysatuan as $ls)
            <tr>
                <td>
                    {{$ls->jenis}}<br>                    
                    <input type="hidden" name="persno[]" id="persno" value="{{Auth::user()->id}}">
                    <input type="hidden" name="jo[]" id="jo" value="{{$ls->jenis}}">
                    <input type="hidden" name="hargasatuan[]" id="hargasatuan" value="{{$ls->harga}}" class="hargasatuan">
                    <b>Rp. {{number_format($ls->harga)}}</b>
                </td>

                <td>
                    <input type="text" name="qty[]" id="qty" class="form-control form-control-sm qty" onkeypress='return isNumberKey(event)' autocomplete="off" placeholder="Jumlah">
                </td>
                <td>
                    <input type="text" name="totalsatuan[]" id="totalsatuan" class="form-control form-control-sm totalsatuan" readonly>
                </td>                 
            </tr>            
        @endforeach
            <tr>
                <td style="text-align: center;" colspan="4">
                    <button class="btn btn-sm btn-success">LANJUTKAN</button>
                </td>
            </tr>
    </tbody>
</table>
</form>

<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

$(".hargasatuan").on('input', compute1);
$(".qty").on('input', compute1);

function compute1()
{
    var tr = $(this).closest("tr");
    var hargaVal = tr.find(".hargasatuan").val();
    var qtyVal = tr.find(".qty").val();
    if (typeof hargaVal == "undefined" || typeof qtyVal == "undefined")
    {
    return;
    } 
    tr.find(".totalsatuan").val(hargaVal * qtyVal);      
      // $("#total").val(hargaVal*qtyVal);
    fnAlltotal();
}
</script>