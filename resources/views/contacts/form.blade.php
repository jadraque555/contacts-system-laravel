<div class="row mb-3">
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />
    <div class="col-md-6">
        <label for="name" class="col-form-label text-md-end">{{ __('Contact Name') }} <span class="text-danger">*</span></label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($contact) ? $contact -> name : '' }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="email" class="col-form-label text-md-end">{{ __('Email') }} <span class="text-danger">*</span> </label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ isset($contact) ? $contact -> email : '' }}"  required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="phone" class="col-form-label text-md-end">{{ __('Contact Phone') }} <span class="text-danger">*</span></label>
        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ isset($contact) ? $contact -> phone : '' }}" required autocomplete="phone" autofocus>
        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6">
        <label for="address" class="col-form-label text-md-end">{{ __('Address') }} <span class="text-danger">*</span> </label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ isset($contact) ? $contact -> address : '' }}"  required autocomplete="address" autofocus>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>
