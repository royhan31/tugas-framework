@extends('layouts.app')

@section('content')
{{Form::text("username",
             old("username") ? old("username") : (!empty($user) ? $user->username : null),
             [
                "class" => "form-group user-email",
                "placeholder" => "Username",
             ])
}}

@endsection
