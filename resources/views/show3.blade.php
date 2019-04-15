@extends('template')
@push('style')
@endpush
@section('content')
<div class="container">
    <div class="row">
    <div class="col-sm">
    <img width="500" height="auto" src="{{asset('kamus/'. $ticket->id . '.jpg')}}">
</div>
<div class="col-sm">
<div class="container">
<table class="table">
<thead>
</thead>
<tbody>
	<tr>
    <th scope="row">Id : <td>{{ $ticket->issue_category_id }} </td></th>
    </tr>
    <tr>
    <tr>
    <th scope="row">Judul : <td>{{ $ticket->name }} </td></th>
    </tr>
    <tr>
    <th scope="row">Penerbit : <td>{{ $ticket->email }} </td></th>
    </tr>
    <th scope="row">Tahun Terbit : <td>{{ $ticket->issue_priority_id }} </td></th>
    </tr>
    <tr>
    <th scope="row">Pengarang : <td>{{ $ticket->description }}</td></th>
    </tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection