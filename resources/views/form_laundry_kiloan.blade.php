
<hr>
<div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-info"></i> Deskripsi</h5>
    Pilih salah satu dan perhitungan biaya berdasarkan timbangan yang ada di laundry.
</div>
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
<form method="POST" action="createlaundrykiloan">
@csrf
<input type="hidden" name="kodekl" id="kodekl" value="{{$code}}">
<input type="hidden" name="persnmkl" id="persnmkl" value="{{Auth::user()->name}}">
<input type="hidden" name="persnokl" id="persnokl" value="{{Auth::user()->id}}">
<input type="hidden" name="typeorderkl" id="typeorderkl" value="KILOAN">
<table class="table table-sm" id="laundrykiloan">
    <tbody>
        @foreach($laundrykiloan as $lk)
            <tr>               
                <td>                    
                    <input type="radio" name="ids" id="ids" class="form-check-input" value="{{$lk->id_services}}">
                    <!-- <input type="radio" name="jolk" id="jolk" class="form-check-input" value="{{$lk->jenis}}"> -->
                    <label class="form-check-label">{{$lk->jenis}} Rp. {{number_format($lk->harga)}}</label>
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