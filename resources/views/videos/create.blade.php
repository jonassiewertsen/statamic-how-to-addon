@extends('statamic::layout')

@section('content')
    <publish-form
            title="My Form"
            action="#"
            :blueprint='@json($blueprint)'
{{--            :meta='@json($meta)'--}}
{{--            :values='@json($values)'--}}
    ></publish-form>
@stop