@extends('app')
@push('style') 
  <link rel="stylesheet" type="text/css" href="{{asset ('css/jquery.dataTables.min.css') }}">
@endpush
@section('content')
<div>
  <div class="row">
    <div class="panel-heading">
      <div class="panel-title">
        <div class="col-md-3">
          <a class="btn btn-primary" href="{{route('issuepriority.create')}}"> Membuat Issue Priority
          </a>             
        </div>
      </div>    
    <div class="col-8 col-md-offset-4">
      <div class="container">
        <div><center><h1>Daftar Issue Priority</h1></center></div>
      </div>
    </div>
    <table class="table table-striped" id="contoh">
      <div class="col-4">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach($ticket as $voucher)
            <tr>
              <td>{{ $no++ }}</td>
              <td>
                <a href="{{route('issuepriority.show', $voucher->id)}}"> <font color=red>{{ $voucher->name }}</font>
                </a>
              </td>
              <td>{{ $voucher->description }}</td>
              <td>
              <a href="{{ route('issuepriority.edit', $voucher->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit
              </a>
              {!! Form::open(['method' => 'DELETE', 'route' => ['issuepriority.destroy', $voucher->id] ]) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </div>
    </table>
    </div>
  </div>
</div>
@endsection
@push('js')
  <script type="text/javascript" src="{{asset ('js/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#contoh').DataTable();
  } );
  </script>
@endpush