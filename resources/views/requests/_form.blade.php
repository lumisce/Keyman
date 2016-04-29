		<fieldset class="form-group">
			{!! Form::label('insurance_id', 'Insurance:') !!}
			{!! Form::select('insurance_id', $plans, isset($selected) ? $selected : 0, ['class' => 'form-control', 'id' => 'plan-select']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::label('request_type_id', 'Request Type:') !!}
			{!! Form::select('request_type_id', $types, isset($selType) ? $selType : 0, ['class' => 'form-control', 'id' => 'type-select']) !!}
		</fieldset>

		<fieldset class="form-group"> 
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		</fieldset>

		@section('footer')
			<script>
				$('#type-select').select2();
				$('#plan-select').select2();
			</script>
		@stop
