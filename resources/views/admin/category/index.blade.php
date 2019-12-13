@extends('admin.master')

@section('title', 'Page Title')


@section('content')
<br>
<a href="{{route('chude.chuDeCreate')}}" class="btn btn-primary">{{__('lable.create')}}</a>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">@lang('lable.nameChuDe')</th>
      <th scope="col">@lang('lable.action')</th>
    </tr>
  </thead>
  <tbody>
    @foreach( $all_chude as $key => $chude )
    
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $chude->name }}</td>
      <td>
        <a href="{{ route('chude.chuDeEdit',['id' => $chude->id]) }}" class="btn btn-warning">{{__('lable.update')}}</a> |
        <a href="{{ route('chude.chuDeDestroy',['id' => $chude->id]) }}" class="btn btn-danger">{{__('lable.delete')}}</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop
    	

