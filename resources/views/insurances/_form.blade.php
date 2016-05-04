		<fieldset class="form-group">
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::label('type', 'Type:') !!}
			{!! Form::select('type', $types, isset($selected) ? $selected : 0, ['class' => 'form-control', 'id' => 'type-select']) !!}
		</fieldset>
		
		<fieldset class="form-group">
			{!! Form::label('payment', 'Price:') !!}
			{!! Form::input('number', 'payment', $insurance->payment ? $insurance->payment : 0.00, ['class' => 'form-control', 'step' => '0.01']) !!}
		</fieldset>

		<fieldset class="form-group"> 
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		</fieldset>

		@section('footer')
			<script>
				$('#type-select').select2();
			</script>
		@stop