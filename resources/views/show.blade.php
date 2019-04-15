@extends('template')
@push('style')
@endpush
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm">
    <img width="500" height="auto" src="{{asset('photos/'. $ticket->id . '.jpg')}}">
</div>
<div class="col-sm">
<div class="container">
<table class="table">
<thead>
</thead>
<tbody>
    <tr>
    <th scope="row">User Id : <td>{{ $ticket->user_id }}</td></th>
    </tr>
    <tr>
    <th scope="row">Name : <td>{{ $ticket->name }} </td></th>
    </tr>
    <tr>
    <th scope="row">Photo Url : <td>{{ $ticket->photo_url }}</td></th>
    </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection