@extends('layouts.main')
@section('content')
@include('layouts.notification')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
    <h5 class="text-white">{{ __('Create New User') }}</h5>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{ url('users') }}" type="button" class="btn btn-sm btn-outline-secondary text-white">User List</a>
        </div>
    </div>
</div>
<div class="pt-2"></div>
<div class="container" >
    <div class="row justify-content-center pt-lg-4 pt-xl-3 text-white bg-dark-blue">
        <form method="POST" action="{{ url('users/store') }}">
            @csrf
            @include('users/form')

            <div class="row pt-lg-4 py-4 mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-ligh-blue">
                        {{ __('Create') }}
                    </button>
                    <a href="{{ url('users') }}" type="submit" class="btn  btn-ligh-blue">
                        {{ __('Cancel') }}
                    </a>
                    <button type="reset" class="btn  btn-ligh-blue">
                        {{ __('Reset') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
