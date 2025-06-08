@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="given-name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sponsor_id" class="col-md-4 col-form-label text-md-end">{{ __('Sponsor ID') }}</label>

                            <div class="col-md-6">
                                <input id="sponsor_id" type="text" class="form-control @error('sponsor_id') is-invalid @enderror" name="sponsor_id" value="{{ old('sponsor_id') }}">

                                @error('sponsor_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <select id="country" class="form-select @error('country') is-invalid @enderror" name="country" required>
                                    <option value="">Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="AU">Australia</option>
                                    <option value="IN">India</option>
                                    <option value="PK">Pakistan</option>
                                    <!-- Other countries -->
                                </select>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <h5 class="mb-3">KYC Verification</h5>

                        <div class="row mb-3">
                            <label for="id_type" class="col-md-4 col-form-label text-md-end">{{ __('ID Type') }}</label>

                            <div class="col-md-6">
                                <select id="id_type" class="form-select @error('id_type') is-invalid @enderror" name="id_type" required>
                                    <option value="">Select ID Type</option>
                                    <option value="passport">Passport</option>
                                    <option value="national_id">National ID</option>
                                    <option value="driving_license">Driving License</option>
                                    <option value="student_id">Student ID</option>
                                </select>

                                @error('id_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_number" class="col-md-4 col-form-label text-md-end">{{ __('ID Number') }}</label>

                            <div class="col-md-6">
                                <input id="id_number" type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" required>

                                @error('id_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="id_document" class="col-md-4 col-form-label text-md-end">{{ __('Upload ID Document') }}</label>

                            <div class="col-md-6">
                                <input id="id_document" type="file" class="form-control @error('id_document') is-invalid @enderror" name="id_document" required>

                                @error('id_document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        <h5 class="mb-3">Payment Information</h5>
                        <p class="alert alert-info">Registration fee: $50.00</p>

                        <div class="row mb-3">
                            <label for="payment_transaction_id" class="col-md-4 col-form-label text-md-end">{{ __('Transaction ID') }}</label>

                            <div class="col-md-6">
                                <input id="payment_transaction_id" type="text" class="form-control @error('payment_transaction_id') is-invalid @enderror" name="payment_transaction_id" value="{{ old('payment_transaction_id') }}" required>

                                @error('payment_transaction_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <small class="form-text text-muted">Enter your PayPal/Bank transaction ID</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="payment_amount" class="col-md-4 col-form-label text-md-end">{{ __('Amount Paid') }}</label>

                            <div class="col-md-6">
                                <input id="payment_amount" type="number" step="0.01" class="form-control @error('payment_amount') is-invalid @enderror" name="payment_amount" value="50.00" required>

                                @error('payment_amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
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
