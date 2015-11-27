@extends('app')

@section('title')
{{$article->title}}
@stop

@section('content')
<h1>{{$article->text}}</h1>
<ul>
	<li>{{$article->title}}</li>
	<li>{{$article->text}}</li>
</ul>
@stop