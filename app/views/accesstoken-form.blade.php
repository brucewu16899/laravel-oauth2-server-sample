@extends('layouts.default')

@section('content')
{{ Form::open(['url' => url('oauth/access_token')]) }}
<p>
	<label>
		grant_type:
		{{ Form::text('grant_type', 'authorization_code') }}
	</label>
</p>
<p>
	<label>
		code:
		{{ Form::text('code', Input::get('code')) }}
	</label>
</p>
<p>
	<label>
		client_id:
		{{ Form::text('client_id', 'my_client_id') }}
	</label>
</p>
<p>
	<label>
		client_secret:
		{{ Form::text('client_secret', 'my_client_secret') }}
	</label>
</p>
<p>
	<label>
		redirect_uri:
		{{ Form::text('redirect_uri', rtrim(Config::get('app.url'), '/').'/'.'callback') }}
	</label>
</p>
<p>
	<label>
		scope:
		{{ Form::text('scope', 'scope1,scope2') }}
	</label>
</p>
<p>
	<label>
		state:
		{{ Form::text('state', '1234567890') }}
	</label>
</p>
{{ Form::submit() }}
{{ Form::close() }}
@stop
