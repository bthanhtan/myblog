@extends('admin.master')

@section('title', 'Page Title')


@section('content')
<br>
<a href="{{route('baiviet.baivietCreate')}}" class="btn btn-primary">{{__('lable.create')}}</a>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">@lang('lable.titleebaiviet')</th>
      <th scope="col">@lang('lable.action')</th>
    </tr>
  </thead>
  <tbody>
    @foreach( $all_baiviet as $key => $baiviet )
    
    <tr>
      <th scope="row">{{ $key+1 }}</th>
      <td>{{ $baiviet->title }}</td>
      <td>
        <a href="{{ route('baiviet.baivietEdit',['id' => $baiviet->id]) }}" class="btn btn-warning">{{__('lable.update')}}</a> |
        <a href="{{ route('baiviet.baivietDestroy',['id' => $baiviet->id]) }}" class="btn btn-danger">{{__('lable.delete')}}</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop
    	

