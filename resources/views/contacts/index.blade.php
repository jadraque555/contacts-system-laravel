@extends('layouts.main')
@section('content')
@include('layouts.notification')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
    <h5 class="text-white">{{ __('Contacts') }}</h5>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ url('contacts/create') }}" type="button" class="btn btn-sm btn-outline-secondary text-white">
                <span class="px-2">Add Contact</span>
            </a>
        </div>
    </div>
</div>
<div class="d-flex justify-content-end my-3">
    <form action="{{ url('contacts') }}" method="GET">
        <div class="d-flex">
            <label for="search">Search:</label>
            <input type="text" value="{{ $request->q }}" class="form-control me-2" id="search" name="q" placeholder="Enter your search term">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>
<div class="table-responsive bg-dark-blue">
    <table class="table text-white" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Date Added</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="text-white data" id="data"> 
            @if($contacts -> count() > 0)
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td>
                            <form action="{{ URL::to('contacts/delete') }}/{{ $contact->id }}" method="POST">
                                <a onClick="triggerDelete({{ $contact->id }})" href="#javascript" type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Contact">
                                    <i class="bi bi-trash"></i>
                                </a>
                                <a href="{{ url('contacts/edit') }}/{{ $contact->id }}" type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Contact">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" align="center">No data found yet</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="col-md-12 py-2">
    @if($contacts->count() != 0)
        {{ $contacts->links('pagination::bootstrap-4') }}
    @endif
</div>
<script>
    function triggerDelete(id) {

        if(confirm("Are you sure to delete this contact?")) {
            window.location.href = '{{ url('contacts/delete/') }}/'+id
        }
    }
$(".btn-delete").on("click", function() {
    if(confirm("Are you sure to delete this imported file including the items associated on this")) {
        $(this).closest('form').submit();
    }
});

$(".download-file").click(function()
{
    $("#download_"+$(this).data('id')).prop('hidden',false);
});

$("#user_id").change(function()
{
    $.ajax({
        type : "GET",
        url : "{{URL::to('import-files/filter-user-activity')}}",
        data:{'user_id':$(this).val()},
        success:function(data)
        {
            $('#data').html(data);

        }
    });
});
</script>
@endsection
