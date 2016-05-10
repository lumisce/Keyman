<link rel="stylesheet" href="/assets/css/add-edit.css">
		<fieldset class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			{!! Form::label('name', 'Name:', ['class' => 'label-requests col-md-3']) !!}
			{!! Form::text('name', null, ['class' => 'form-control col-md-9']) !!}
		</fieldset>
		<fieldset class="form-group"> 
			{!! Form::label('', '', ['class' => 'label-requests col-sm-6 col-sm-3 col-sm-offset-6']) !!}
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		</fieldset>