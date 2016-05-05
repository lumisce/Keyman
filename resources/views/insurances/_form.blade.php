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
			    $(".deleteForm").on("submit", function(){
			        if (confirm("Do you want to delete this Insurance?")) {
			        	if(confirm("Are you sure? This will delete the insurance from customers' records. It will also delete the requests made for this insurance.")) {
			        		return(confirm("For the last time, are you sure you want to delete this?"));
			        	};
			        };
			        return false;
			    });
			</script>
		@stop