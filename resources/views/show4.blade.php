@extends('template')
@push('style')
@endpush
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm">
    <img width="500" height="auto" src="{{asset('snapshots/'. $ticket->id . '.jpg')}}">
</div>
<div class="col-sm">
<div class="container">
<table class="table">
<thead>
</thead>
<tbody>
    <tr>
    <th scope="row">Name : <td>{{ $ticket->name }} </td></th>
    </tr>
    <tr>
    <th scope="row">Description : <td>{{ $ticket->description }}</td></th>
    </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
@endsection