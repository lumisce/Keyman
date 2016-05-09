	<link rel="stylesheet" href="/assets/css/add-edit.css">
	<style type="text/css">
		.form-control {
		    text-align: left;
		    font-family: 'Nav';
		    width: 50%;
		}
	</style>
		<fieldset class="form-group">
			{!! Form::label('name', 'Name:', ['class' => 'label-requests col-xs-6']) !!}
			{!! Form::text('name', null, ['class' => 'col-sm-6 form-control']) !!}
		</fieldset>

		<fieldset class="form-group">
			
			{!! Form::label('ideal_turnaround', 'Ideal Turnaround (days):', ['class' => 'label-requests col-xs-6']) !!}
			{!! Form::input('number', 'ideal_turnaround', $type->ideal_turnaround ? $type->ideal_turnaround : 1, ['class' => 'col-sm-6 form-control']) !!}
		</fieldset>

		<fieldset class="form-group"> 

			{!! Form::label('', '', ['class' => 'label-requests col-sm-6 col-sm-3 col-sm-offset-6']) !!}
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		</fieldset>