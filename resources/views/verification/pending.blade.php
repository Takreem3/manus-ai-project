@extends('layouts.app')

@section('title', 'Verification Pending')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-warning text-dark">
                    <h3 class="text-center font-weight-light my-2">Account Verification Pending</h3>
                </div>
                
                @if (session('status'))
                    <div class="alert alert-info mt-3">
                        {{ session('status') }}
                    </div>
                @endif
                
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-clock fa-4x text-warning mb-3"></i>
                        <h4>Your account is awaiting verification</h4>
                        <p class="lead">Our admin team is reviewing your information and will approve your account soon.</p>
                    </div>
                    
                    <div class="alert alert-info">
                        <h5>Verification Status:</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="fas {{ auth()->user()->kyc_verified ? 'fa-check-circle text-success' : 'fa-clock text-warning' }} mr-2"></i>
                                KYC Verification: <strong>{{ auth()->user()->kyc_verified ? 'Approved' : 'Pending' }}</strong>
                            </li>
                            <li>
                                <i class="fas {{ auth()->user()->payment_verified ? 'fa-check-circle text-success' : 'fa-clock text-warning' }} mr-2"></i>
                                Payment Verification: <strong>{{ auth()->user()->payment_verified ? 'Approved' : 'Pending' }}</strong>
                            </li>
                        </ul>
                    </div>
                    
                    <p>If you have any questions about your account verification, please contact our support team.</p>
                    
                    <div class="text-center mt-4">
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="btn btn-secondary">
                            Logout
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
