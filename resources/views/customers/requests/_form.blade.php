	
<link rel="stylesheet" href="/assets/css/add-edit.css">
<style>

	.select2-container{
		width: 60% !important;
	}

	@media (max-width: 767px) {
		.select2-container{
			width: 100% !important;
		}
	}
	.select2-selection{
		width:100% !important;
		border-radius: 0 !important; 
		border-width: 2px !important;
		border-color: #888888 !important;
		height: 34px !important;
		padding: 2px 4px 0 !important;
	}
	.select2-selection__arrow{
		height: 34px !important;
	}
	.select2-container--default .select2-selection--single .select2-selection__arrow b{
		display: initial !important;
	}

</style>

		<fieldset class="form-group">
			{!! Form::label('insurance_id', 'Insurance:', ['class' => 'label-requests col-md-3']) !!}
			{!! Form::select('insurance_id', $plans, isset($selected) ? $selected : 0, ['class' => 'form-control col-md-9', 'id' => 'plan-select']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::label('request_type_id', 'Request Type:', ['class' => 'label-requests col-md-3']) !!}
			{!! Form::select('request_type_id', $types, isset($selType) ? $selType : 0, ['class' => 'form-control col-md-9', 'id' => 'type-select']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::label('', '', ['class' => 'label-requests col-sm-6 col-sm-3 col-sm-offset-6']) !!}
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		</fieldset>
		
		@section('footer')
			<script>
				$('#type-select').select2();
				$('#plan-select').select2();
			</script>
		@stop