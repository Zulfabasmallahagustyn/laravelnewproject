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
          <a class="btn btn-primary" href="{{route('profile.create')}}"> Membuat Profile</a>             
        </div>
      </div>
    <div class="col-8 col-md-offset-4">
      <div class="container">
        <div><h3>Daftar Profile</h3></div>
      </div>
    </div>
    <table class="table table-striped" id="contoh">
      <div class="col-4">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">User Id</th>
            <th scope="col">Name</th>
            <th scope="col">Photo Url</th>
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
                  <a href="{{route('profile.show', $voucher->id)}}"> <font color=red>{{ $voucher->user_id }}</font>
                  </a>
                </td>
                <td>{{ $voucher->name }}</td>
                <td>{{ $voucher->photo_url }}</td>
                <td>
                  <a href="{{ route('profile.edit', $voucher->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit
                  </a>
                  {!! Form::open(['method' => 'DELETE', 'route' => ['profile.destroy', $voucher->id] ]) !!}
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