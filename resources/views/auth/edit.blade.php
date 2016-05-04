@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Account Information</div>
                <div class="panel-body">

                    {!! Form::model(Auth::user(), ['method' => 'PATCH', 'action' => ['Auth\AuthController@update', Auth::id()], 'class'=>'form-horizontal']) !!}
                        @include('auth._form', ['submitButtonText' => 'Update'])
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
