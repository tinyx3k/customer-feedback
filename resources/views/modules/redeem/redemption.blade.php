@extends('layouts.dashmix')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="block block-rounded">
			<div class="block-content text-center">
				<h1 class="text-primary font-w700">Please scan QR Code</h1>
			</div>
		</div>
	</div>
</div>
@stop
@section('scripts')
@if(auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Cashier'))
<script>
    var redeem_url = '{{ route('process.deal', ['@', '#']) }}';
    var information_string = "";
    document.addEventListener('keypress', function(e) {
        if(e.charCode === 13) {
            redeemPage();
        }else{
            information_string += e.key;
        }
    });

    function redeemPage(){
        var info_arr = information_string.split("|");
        var user_exists = null;
        var item_exists = null;
        if(info_arr.length == 2){
            $.ajax({
                url: '/check-user/'+info_arr[0],
                type: 'POST',
                success: function(res){
                    if(res.id === undefined){
                        user_exists = false;
                    }else{
                        user_exists = true;
                    }
                },
                async: false,
            });

            $.ajax({
                url: '/check-item/'+info_arr[1],
                type: 'POST',
                success: function(res) {
                    if(res.id === undefined){
                        item_exists = false;
                    }else{
                        item_exists = true;
                    }
                },
                async: false,
            });
            if(user_exists && item_exists){
                redeem_url = redeem_url.replace('@', info_arr[0]);
                redeem_url = redeem_url.replace('#', info_arr[1]);
                window.location.href = redeem_url;
            }else{
                alert('QR Code invalid! Please re-scan.');
                redeem_url = '{{ route('process.deal', ['@', '#']) }}';
                information_string = "";
            }
            console.log(user_exists, item_exists);
        }else{
            alert('QR Code invalid! Please re-scan.');
            redeem_url = '{{ route('process.deal', ['@', '#']) }}';
            information_string = "";
        }
    }
</script>
@endif
@stop