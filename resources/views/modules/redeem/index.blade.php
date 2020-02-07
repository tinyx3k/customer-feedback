@extends('layouts.dashmix')
@section('style')
<link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">
@stop
@section('content')
<div class="row">
	<div class="col-sm-12 col-lg-12">
		<div class="block block-bordered block-rounded block-fx-shadow">
			<div class="block-header bg-primary">
				<h3 class="block-title text-white">Earn Points</h3>
			</div>
			<div class="block-content">
				<form action="" method="POST">
					@csrf
					<div class="form-group">
						<label>Customer <button class="btn btn-sm btn-success" type="button" onclick="resetKeyInput()">Click here before scanning Customer's QR Code</button></label>
						<select name="user_id" id="user_id" class="form-control" required>
							<option value="" disabled selected>Scan QR Code...</option>
							@foreach($users as $user)
							<option value="{{ $user->qr_data }}">{{ $user->first_name.' '.$user->last_name }}</option>
							@endforeach
						</select>
					</div>
					<h3 class="content-heading">Items to Earn Points From</h3>
					<div class="form-group">
						<label>Choose an item <button class="btn btn-sm btn-success" id="add-item" type="button"><i class="fa fa-plus"></i></button></label>
						<select id="item-to-add" class="form-control">
						@forelse($items as $item)
						<option value="{{ $item->id }}" data-point="{{ $item->points }}">{{ $item->name . ' (' . $item->points}} PTS)</option>
						@empty
						<option value="" disabled selected>No items in your inventory.</option>
						@endforelse
						</select>
					</div>
					<div class="row">
						<div class="col-lg-12" id="items-container">
							
						</div>
					</div>
						<div class="form-group">
							<label>Total Points to Add</label>
							<input type="text" disabled class="form-control" style="font-weight: 900" id="total-points-to-add">
						</div>
					<div class="form-group">
						<button class="btn btn-primary"><i class="fa fa-star mr-1"></i>Add Points</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
{{-- <div class="form-group">
	<label>{{$item->name}} ({{$item->points}} pts.)</label>
	<input type="number" class="form-control" name="item[{{$item->id}}]" min="0" value="0" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="Enter quantity...">
</div> --}}
@stop
@section('scripts')
<script src="{{asset('js/plugins/select2/js/select2.min.js')}}"></script>
<script>jQuery(function(){ Dashmix.helpers(['select2']); });</script>
<script>
	$('#item-to-add').select2();
	$('#add-item').on('click', function() {
		var selected_item_data = $('#item-to-add').select2('data')[0];
		console.log(selected_item_data);
		if(selected_item_data.id == ""){
			alert('No item(s) selected!');
		}else{
			if(document.getElementById(selected_item_data.id)){
				alert('Item is already in list!');
			}else{
				$('#items-container').append(`
					<div class="form-group" id="${selected_item_data.id}">
						<label>${selected_item_data.text} <button class="btn btn-warning btn-sm" type="button" onclick="removeElement('${selected_item_data.id}')"><i class="fa fa-trash"></i></button></label>
						<input type="number" class="form-control item-list-item" name="item[${selected_item_data.id}]" min="0" value="0" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="Enter quantity..." onkeyup="recompute()" data-point="${selected_item_data.element.dataset.point}">
					</div>
				`);
			}
		}
	});

	function removeElement(id) {
		document.getElementById(id).remove();
	}

    var information_string = "";

    document.addEventListener('keypress', function(e) {
        if(e.charCode == 13) {
            selectUser();
        }else{
            information_string += e.key;
        }
    });

    function resetKeyInput()
    {
    	information_string = "";
    	$('#user_id').val(information_string);
    }

    function selectUser()
    {
    	console.log(information_string);
    	if(information_string != "") {
    		$('#user_id').val(information_string);
    	}else{
    		alert('Error! Please click the button before scanning.');
    	}
    	
    }

    function recompute()
    {
    	var total_value = 0;

    	Array.from(document.getElementsByClassName('item-list-item')).forEach(function(e, i, a) {
    		var up = e.value * e.dataset.point;
    		total_value += up;
    	});

    	$('#total-points-to-add').val(total_value);
    }
</script>
@stop