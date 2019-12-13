@extends('admin.master')

@section('title', 'Page Title')


@section('content')

<form action="{{ isset($baiviet->id) ? route('baiviet.baivietUpdate',[ 'id'=>$baiviet->id ]) : route('baiviet.baivietStore') }}" method="post">
	@csrf
	@if(isset($baiviet->id))
	@method('PUT')
	@endif
  <div class="form-group">
    <label>{{__('lable.titleProduct')}}</label>
    <input type="text" class="form-control" name="title" value="{{ old('title', $baiviet->title ?? '') }}">
    <p class="text-danger">{{ $errors->first('name') }}</p>
  </div>
  <div class="form-group">
    <label>{{__('lable.contentProduct')}}</label>
    <input type="text" class="form-control" name="content" value="{{ old('content', $baiviet->content ?? '') }}">
    <p class="text-danger">{{ $errors->first('content') }}</p>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">{{__('lable.category_id')}}</label>
    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
      @foreach($all_chude as $chude)
      <option value="{{$chude->id}}">{{$chude->name}}</option>
      @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">
	@if(isset($baiviet->id))
	{{__('lable.update')}}
	@else
	{{__('lable.create')}}
	@endif
  </button>
</form>
@stop
    	

