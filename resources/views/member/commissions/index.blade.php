@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Commissions</h4>
                </div>
                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Commission Summary</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">Available Balance</h6>
                                            <h3 class="text-primary">${{ number_format($data['available_balance'], 2) }}</h3>
                                            @if($data['available_balance'] > 0)
                                                <button class="btn btn-primary btn-sm">Withdraw</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">This Month</h6>
                                            <h3 class="text-success">${{ number_format($data['this_month'], 2) }}</h3>
                                            <small class="text-muted">{{ $data['this_month_change'] >= 0 ? '+' : '' }}{{ $data['this_month_change'] }}% from last month</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">Last Month</h6>
                                            <h3 class="text-info">${{ number_format($data['last_month'], 2) }}</h3>
                                            <small class="text-muted">{{ $data['last_month_change'] >= 0 ? '+' : '' }}{{ $data['last_month_change'] }}% from previous</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">Total Earned</h6>
                                            <h3 class="text-warning">${{ number_format($data['total_earned'], 2) }}</h3>
                                            <small class="text-muted">Since joining</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Commission History</h5>
                            <a href="{{ route('member.commissions.calculator') }}" class="btn btn-primary">Commission Calculator</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Source</th>
                                            <th>Level</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($data['commission_history']) > 0)
                                            @foreach($data['commission_history'] as $commission)
                                            <tr>
                                                <td>{{ $commission['date'] }}</td>
                                                <td>{{ $commission['type'] }}</td>
                                                <td>{{ $commission['source'] }}</td>
                                                <td>{{ $commission['level'] }}</td>
                                                <td>${{ number_format($commission['amount'], 2) }}</td>
                                                <td><span class="badge bg-{{ $commission['status'] == 'Paid' ? 'success' : 'warning' }}">{{ $commission['status'] }}</span></td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center">No commission history found</td>
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
@endsection
