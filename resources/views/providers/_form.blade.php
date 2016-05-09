<link rel="stylesheet" href="/assets/css/add-edit.css">

        <fieldset class="form-group">
            {!! Form::label('name', 'Name:', ['class' => 'label-requests col-xs-3']) !!}
            {!! Form::text('name', null, ['class' => 'col-sm-9 form-control']) !!}
        </fieldset>
            
        <fieldset class="form-group">
            {!! Form::label('location', 'Location:', ['class' => 'label-requests col-xs-3']) !!}
            {!! Form::text('location', null, ['class' => 'col-sm-9 form-control']) !!}
        </fieldset>
            
        <fieldset class="form-group">
            {!! Form::label('email', 'Email:', ['class' => 'label-requests col-xs-3']) !!}
            {!! Form::email('email', null, ['class' => 'col-sm-9 form-control']) !!}
        </fieldset>
            
        <fieldset class="form-group">
            {!! Form::label('phone_num', 'Phone Number:', ['class' => 'label-requests col-xs-3']) !!}
            {!! Form::text('phone_num', null, ['class' => 'col-sm-9 form-control']) !!}
        </fieldset>
            
        <fieldset class="form-group"> 
            {!! Form::label('', '', ['class' => 'label-requests col-sm-6 col-sm-3 col-sm-offset-6']) !!}
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
        </fieldset>