		<fieldset class="form-group">
			
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}
		</fieldset>
		<fieldset class="form-group"> 
			
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		</fieldset>