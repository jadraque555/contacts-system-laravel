<br>
@if (session('success'))
<div class="alert alert-success " role="alert">
    {{ session('success') }}
</div>
@endif
@if (session('warning'))
<div class="alert alert-warning " role="alert">
    {{ session('warning') }}
</div>
@endif
@if (session('danger'))
<div class="alert alert-danger " role="alert">
    {{ session('danger') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger " role="alert">
    {{ session('error') }}
</div>
@endif
@if (session('info'))
<div class="alert alert-info " role="alert">
    {{ session('info') }}
</div>
@endif
@if (session('secondary'))
<div class="alert alert-secondary " role="alert">
    {{ session('secondary') }}
</div>
@endif