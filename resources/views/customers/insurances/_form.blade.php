
<link rel="stylesheet" href="/assets/css/add-edit.css">

		<fieldset class="form-group">
			{!! Form::label('name', 'Plan:', ['class' => 'label-requests col-sm-3']) !!}
			{!! Form::select('name', $plans, isset($selPlan) ? $selPlan : 0, ['class' => 'form-control col-sm-9','id' => 'plan-select']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary col-xs-offset-4']) !!}
		</fieldset>

		@section('footer')
			<script>
				// $('#type-select').select2();
				$('#plan-select').select2();
				// // $('#plan-select').attr('disabled', 'disabled');

				// $('#type-select').on('change', function(e) {
				// 	if ($('#type-select').val() != 0) {
				// 		$('#plan-select').removeAttr('disabled');
				// 	};
				// 	if ($('#type-select').val() == 0) {
				// 		$('#plan-select').attr('disabled', 'disabled');
				// 	};
				// });
			</script>
		@stop