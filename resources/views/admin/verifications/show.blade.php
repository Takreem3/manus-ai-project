@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Verify User: {{ $user->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>User Information</h5>
                            <table class="table">
                                <tr>
                                    <th>Name:</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Country:</th>
                                    <td>{{ $user->country }}</td>
                                </tr>
                                <tr>
                                    <th>Sponsor ID:</th>
                                    <td>{{ $user->sponsor_id ?? 'None' }}</td>
                                </tr>
                                <tr>
                                    <th>Registration Date:</th>
                                    <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>KYC Information</h5>
                            <table class="table">
                                <tr>
                                    <th>ID Type:</th>
                                    <td>{{ ucfirst(str_replace('_', ' ', $user->id_type)) }}</td>
                                </tr>
                                <tr>
                                    <th>ID Number:</th>
                                    <td>{{ $user->id_number }}</td>
                                </tr>
                                <tr>
                                    <th>ID Document:</th>
                                    <td>
                                        @if ($user->id_document)
                                            <a href="{{ Storage::url($user->id_document) }}" target="_blank" class="btn btn-sm btn-info">View Document</a>
                                        @else
                                            No document uploaded
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>KYC Status:</th>
                                    <td>
                                        @if ($user->kyc_verified)
                                            <span class="badge bg-success">Verified</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Payment Information</h5>
                            <table class="table">
                                <tr>
                                    <th>Transaction ID:</th>
                                    <td>{{ $user->payment_transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>Amount:</th>
                                    <td>${{ number_format($user->payment_amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Date:</th>
                                    <td>{{ $user->payment_date ? $user->payment_date->format('Y-m-d H:i:s') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status:</th>
                                    <td>
                                        @if ($user->payment_verified)
                                            <span class="badge bg-success">Verified</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.verifications.verify', $user->id) }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Update Verification Status</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">KYC Verification</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kyc_verified" id="kyc_verified_1" value="1" {{ $user->kyc_verified ? 'checked' : '' }}>
                                                <label class="form-check-label" for="kyc_verified_1">
                                                    Approve
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="kyc_verified" id="kyc_verified_0" value="0" {{ !$user->kyc_verified ? 'checked' : '' }}>
                                                <label class="form-check-label" for="kyc_verified_0">
                                                    Reject
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Payment Verification</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_verified" id="payment_verified_1" value="1" {{ $user->payment_verified ? 'checked' : '' }}>
                                                <label class="form-check-label" for="payment_verified_1">
                                                    Approve
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_verified" id="payment_verified_0" value="0" {{ !$user->payment_verified ? 'checked' : '' }}>
                                                <label class="form-check-label" for="payment_verified_0">
                                                    Reject
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary">Update Verification Status</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <a href="{{ route('admin.verifications.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
