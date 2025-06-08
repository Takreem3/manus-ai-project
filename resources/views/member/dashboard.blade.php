@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Member Dashboard</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Personal Volume</h5>
                                    <h2 class="card-text">{{ number_format($data['personal_volume']) }} PV</h2>
                                    <p class="card-text"><small>+{{ $data['personal_volume_change'] }} this month</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Group Volume</h5>
                                    <h2 class="card-text">{{ number_format($data['group_volume']) }} GV</h2>
                                    <p class="card-text"><small>+{{ $data['group_volume_change'] }} this month</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Commissions</h5>
                                    <h2 class="card-text">${{ number_format($data['commissions']) }}</h2>
                                    <p class="card-text"><small>+${{ $data['commissions_change'] }} this month</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card bg-warning text-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Referrals</h5>
                                    <h2 class="card-text">{{ $data['referrals'] }}</h2>
                                    <p class="card-text"><small>+{{ $data['referrals_change'] }} this month</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Recent Commissions</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($data['recent_commissions']) > 0)
                                                    @foreach($data['recent_commissions'] as $commission)
                                                    <tr>
                                                        <td>{{ $commission['type'] }}</td>
                                                        <td>${{ $commission['amount'] }}</td>
                                                        <td>{{ $commission['date'] }}</td>
                                                        <td><span class="badge bg-{{ $commission['status'] == 'Paid' ? 'success' : 'warning' }}">{{ $commission['status'] }}</span></td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="4" class="text-center">No commission records found</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Recent Referrals</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Level</th>
                                                    <th>Joined</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($data['recent_referrals']) > 0)
                                                    @foreach($data['recent_referrals'] as $referral)
                                                    <tr>
                                                        <td>{{ $referral['name'] }}</td>
                                                        <td>{{ $referral['level'] }}</td>
                                                        <td>{{ $referral['joined'] }}</td>
                                                        <td><span class="badge bg-{{ $referral['status'] == 'Active' ? 'success' : 'warning' }}">{{ $referral['status'] }}</span></td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="4" class="text-center">No referrals yet</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
