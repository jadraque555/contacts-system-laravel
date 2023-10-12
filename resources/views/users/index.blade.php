@extends('layouts.main')
@section('content')
@include('layouts.notification')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
    <h5 class="text-white">{{ __('Users') }}</h5>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <a href="{{ url('users/create') }}" type="button" class="btn btn-sm btn-outline-secondary text-white">Create User</a>
        </div>
    </div>
</div>
<div class="pt-2"></div>
<div class="table-responsive bg-dark-blue">
    <table class="table text-white" width="100%">
        <thead>
            <tr>
                <th>Role</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-white">
            @foreach($users as $user)
                <tr>
                    <td>
                        <select class="form-control select-role" data-id="{{ $user->id }}" name="role" id="role">
                            @foreach($roles as $role)
                                @if($user->role == $role)
                                    <option value="{{$role}}" selected> {{ $role }} </option>
                                @else
                                    <option value="{{$role}}"> {{ $role }} </option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <input disabled type="password" class="form form-control" id="password-{{$user->id}}" value="{{ $user->secret_key }}" />
                    </td>
                    <td>
                       
                        <form action="{{ URL::to('users/delete') }}/{{ $user->id }}" method="POST">
                            <button type="button" class="btn btn-sm btn-outline-secondary view-pass " data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View user password" data-id="{{ $user->id }}">
                                <i class="bi bi-eye-slash " id="eye-open-{{$user->id}}"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary copy-pass" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Copy user password" data-id="{{ $user->id }}">
                                <i class="bi bi-files" id="file-{{$user->id}}"></i>
                            </button>
                            <button {{ $user->id == 1 ? 'disabled' : ''}} data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete user account" type="submit" class="btn btn-sm btn-outline-secondary">
                                <span class="bi bi-trash"></span>
                            </button>
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="col-md-12 py-2">
    @if($users->count() != 0)
        {{ $users->links('pagination::bootstrap-4') }}
    @endif
</div>
<script>
$(".select-role").change(function(e)
{
    e.preventDefault();

    $.ajax({
        type:'POST',
        url:"{{URL::to('users/update-role')}}",
        data:{id:$(this).data('id'), role:$(this).val()},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(data){
            $('td').html();

            alert('Success! User role has been successfully updated.');
        },
        error : function() {
            alert('Error!');
        }
    });

}); 
$(".view-pass").click(function()
{
    var id = $(this).data('id');
    var password = document.getElementById("password-"+id);

    if (password.type === "password") {
        password.type = "text";
        $('#eye-open-'+id).attr('class','bi bi-eye');

    } else {
        password.type = "password";
        $('#eye-open-'+id).attr('class','bi bi-eye-slash');
    }

});

$(".copy-pass").click(function()
{
    var id = $(this).data('id');
    var copy_password = document.getElementById("password-"+id);

    copy_password.select();
    copy_password.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copy_password.value);

    $('#file-'+id).attr('class','bi bi-check-circle text-success');


    setTimeout(function(){
        $('#file-'+id).attr('class','bi bi-files');
    }, 3000);



});

</script>
@endsection
