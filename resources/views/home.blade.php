@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mt-2">
    <h5 class="text-white">{{ __('Dashboard') }}</h5>

</div>
<div class="content text-white">
    {{ __('You are logged in!') }}
</div>
@endsection
