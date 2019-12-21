@extends('statamic::layout')

@section('content')
    <publish-form
        title="Add a new Video"
        action="#"
        :blueprint='@json($blueprint)'
        :meta='@json($meta)'
        :values='@json($values)'
    ></publish-form>
@stop