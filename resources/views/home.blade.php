@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2">
    <h5 class="text-white">{{ __('Dashboard') }}</h5>

</div>
<div class="content text-white">
    {{ __('You are logged in!') }}
    <a href="{{ url('contacts') }}" class="btn btn-secondary ms-2">Continue</a>
</div>
@endsection
