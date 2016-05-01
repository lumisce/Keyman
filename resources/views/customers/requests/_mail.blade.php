		<fieldset class="form-group">
			{!! Form::label('receiver', 'To:') !!}
			{!! Form::email('receiver', $receiver, ['class' => 'form-control']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::label('subject', 'Subject:') !!}
			{!! Form::email('subject', $subject, ['class' => 'form-control']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::label('content', 'Message:') !!}
			{!! Form::textarea('content', $content, ['class' => 'form-control']) !!}
		</fieldset>

		<fieldset class="form-group">
			{!! Form::label('status', 'Status:') !!}
			{!! Form::select('status', $status, isset($selected) ? $selected : 'ONGOING', ['class' => 'form-control', 'id' => 'type-select']) !!}
		</fieldset>

		<fieldset class="form-group"> 
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		</fieldset>

		@section('footer')
			<script>
				$('#type-select').select2();
			</script>
		@stop