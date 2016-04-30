		<fieldset class="form-group">
			
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</fieldset>

		<fieldset class="form-group">
			
			{!! Form::label('ideal_turnaround', 'Ideal Turnaround (days):') !!}
			{!! Form::input('number', 'ideal_turnaround', $type->ideal_turnaround ? $type->ideal_turnaround : 1, ['class' => 'form-control']) !!}
		</fieldset>

		<fieldset class="form-group"> 
			
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		</fieldset>