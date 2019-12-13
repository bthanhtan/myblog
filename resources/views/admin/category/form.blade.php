@extends('admin.master')

@section('title', 'Page Title')


@section('content')

<form action="{{ isset($chude->id) ? route('chude.chuDeUpdate',[ 'id'=>$chude->id ]) : route('chude.chuDeStore') }}" method="post">
	@csrf
	@if(isset($chude->id))
	@method('PUT')
	@endif
  <div class="form-group">
    <label>{{__('lable.nameCategory')}}</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $chude->name ?? '') }}">
    <p class="text-danger">{{ $errors->first('name') }}</p>
  </div>
  <button type="submit" class="btn btn-primary">
	@if(isset($chude->id))
	{{__('lable.update')}}
	@else
	{{__('lable.create')}}
	@endif
  </button>
</form>
@stop
    	

