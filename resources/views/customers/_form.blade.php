	<link rel="stylesheet" href="/assets/css/add-edit.css">
	
		<fieldset class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
			{!! Form::label('first_name', 'First Name:', ['class' => 'label-requests col-xs-3']) !!}
			{!! Form::text('first_name', null, ['class' => 'col-sm-9 form-control']) !!}
		</fieldset>

		<fieldset class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
			{!! Form::label('last_name', 'Last Name:', ['class' => 'label-requests col-xs-3']) !!}
			{!! Form::text('last_name', null, ['class' => 'col-sm-9 form-control']) !!}
		</fieldset>

		<fieldset class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
			{!! Form::label('middle_name', 'Middle Name:', ['class' => 'label-requests col-xs-3']) !!}
			{!! Form::text('middle_name', null, ['class' => 'col-sm-9 form-control']) !!}
		</fieldset>

		<fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
			{!! Form::label('email', 'Email:', ['class' => 'label-requests col-xs-3']) !!}
			{!! Form::email('email', null, ['class' => 'col-sm-9 form-control']) !!}
		</fieldset>

		<fieldset class="form-group{{ $errors->has('phone_num') ? ' has-error' : '' }}">
			{!! Form::label('phone_num', 'Phone Number:', ['class' => 'label-requests col-xs-3']) !!}
			{!! Form::text('phone_num', null, ['class' => 'col-sm-9 form-control']) !!}
		</fieldset>
		
		<fieldset class="form-group">
			{!! Form::label('', '', ['class' => 'label-requests col-sm-6 col-sm-3 col-sm-offset-6']) !!}
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		</fieldset>