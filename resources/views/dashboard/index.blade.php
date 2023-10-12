@extends('layouts.main')

@section('content')
  @if(\Auth::user()->role == "super-administrator")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
      <div class="col-md-3">
        <div class="card bg-dark-blue text-white">
            <div class="card-body">
              <h1><i class="bi bi-people"></i> {{ $user_count }}</h1>
            </div>
            <div class="card-footer" style="border-top:1px solid #6C757D !important">
              <a class="btn btn-sm btn-outline-secondary" href="{{ url('users')}}"> {{ __('View details')}} </a>
            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-dark-blue text-white">
            <div class="card-body">
              <h1><i class="bi bi-layers"></i> {{ $import_count }}</h1>
            </div>
            <div class="card-footer" style="border-top:1px solid #6C757D !important">
                <a class="btn btn-sm btn-outline-secondary" href="{{ url('logs')}}"> {{ __('View details')}} </a>
            </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-dark-blue text-white">
            <div class="card-body">
              <h1><i class="bi bi-globe"></i> {{ $visitor_count }}</h1>
            </div>
            <div class="card-footer" style="border-top:1px solid #6C757D !important">
              <a class="btn btn-sm btn-outline-secondary" href="{{ url('visitors')}}"> {{ __('View details')}} </a>
            </div>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ">
      <h5 class="text-white">Visitors Logs</h5>
    </div>

    <div class="table-responsive bg-dark-blue">
      <table class="table text-white" width="100%">
        <thead>
            <tr>
                <th>IP Address</th> 
                <th>Country</th>
                <th>City</th>
                <th>Zip Code</th>
                <th>Brwoser type</th>
                <th>Times visited</th>
                <th>Last date visited</th>
            </tr>
        </thead>
        <tbody>
          @foreach($visitors_logs as $logs)
            <tr>
              <td> {{$logs->ip_address}} </td>
              <td> {{$logs->country}} </td>
              <td> {{$logs->city}} </td>
              <td> {{$logs->zip_code}} </td>
              <td> {{$logs->browser_type}} </td>
              <td> {{$logs->count_visit}} </td>
              <td> {{$logs->date}} </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="col-md-12 py-2">
      @if($visitors_logs->count() != 0)
          {{ $visitors_logs->links('pagination::bootstrap-4') }}
      @endif
    </div>

  @else

  <div class="d-flex justify-content-between flex-wrap pt-4 flex-md-nowrap align-items-center ">
    <h5 class="text-white">Quickbook Records (Wheels Products)</h5>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
      <a type="button" class="btn btn-sm btn-outline-secondary text-white">
        <i class="bi bi-upload"></i> Import  Quickbook
      </a>
      </div>
    </div>
  </div>
  <div class="pt-2"></div>
  <div class="table-responsive pt-2 bg-dark-blue">
    <table class="table text-white" width="100%">
      <thead>
          <tr>
              <th>Timestamp</th> 
              <th>Original Copy</th>
              <th>Filtered Wheels</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  <div class="col-md-12 py-2">
  
  </div>

  @endif
@endsection
