@extends('layouts.app')

@section('content')
<div class="auth container h-100 p-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center p-3"><h6>{{ __('Register') }}</h6></div>

                <div class="card-body px-5 pt-4 pb-3">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- name -->
                        <div class="mb-2 row">
                            <label for="name" class="col-md-12 col-form-label text-md-right">{{ __('Name') }}</label>
                            
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- surname -->
                        <div class="mb-2 row">
                            <label for="surname" class="col-md-12 col-form-label text-md-right">{{ __('Surame') }}</label>
                            
                            <div class="col-md-12">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- date of birth -->
                        <div class="mb-2 row">
                            <label for="dateOfBirth" class="col-md-12 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>
                            
                            <div class="col-md-12">
                                <input id="dateOfBirth" type="date" class="form-control @error('dateOfBirth') is-invalid @enderror" name="dateOfBirth" value="{{ old('dateOfBirth') }}" required autocomplete="surname" autofocus>

                                @error('dateOfBirth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- email -->
                        <div class="mb-2 row">
                            <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- password -->
                        <div class="mb-2 row">
                            <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- confirm password -->
                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- register button -->
                        <div class="mb-4 row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
