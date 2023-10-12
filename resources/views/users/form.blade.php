<div class="row mb-3">

    <div class="col-md-6">
        <label for="name" class="col-form-label text-md-end">{{ __('Full Name') }} <span class="text-danger">*</span></label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="email" class="col-form-label text-md-end">{{ __('User Email') }} <span class="text-danger">*</span> </label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="status" class="col-form-label text-md-end">{{ __('Assign role') }} <span class="text-danger">*</span></label>
        <select class="form form-control" name="role" id="role" value="">
            <option selected>-- Select Role --</option>
            @foreach($roles as $role)
                <option value="{{ $role }}">{{ $role }}</option>
            @endforeach
        </select>
        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="password" class="col-form-label text-md-end">{{ __('User password') }} <span>(System generated. Can't change).</span>  </label>
        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="" readonly autocomplete="password" autofocus>

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>
<script>

    $(document).ready(function()
    {
        var chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var password = "";

        for (var i = 0; i <= 8; i++) {
            var randomNumber = Math.floor(Math.random() * chars.length);
            password += chars.substring(randomNumber, randomNumber +1);
        }   

        $("#password").val(password);

    });
    
    
</script>