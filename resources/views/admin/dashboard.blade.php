@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Admin Dashboard</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Members</h5>
                                    <h2 class="card-text">1,250</h2>
                                    <p class="card-text"><small>+15 this week</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Total Sales</h5>
                                    <h2 class="card-text">$125,750</h2>
                                    <p class="card-text"><small>+$3,250 this week</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Commissions Paid</h5>
                                    <h2 class="card-text">$35,250</h2>
                                    <p class="card-text"><small>+$950 this week</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-4">
                            <div class="card bg-warning text-dark">
                                <div class="card-body">
                                    <h5 class="card-title">Active Products</h5>
                                    <h2 class="card-text">48</h2>
                                    <p class="card-text"><small>+3 this week</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Recent Signups</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>john@example.com</td>
                                                    <td>{{ date('Y-m-d') }}</td>
                                                    <td><span class="badge bg-success">Active</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Jane Smith</td>
                                                    <td>jane@example.com</td>
                                                    <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                                    <td><span class="badge bg-warning">Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Robert Johnson</td>
                                                    <td>robert@example.com</td>
                                                    <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                                    <td><span class="badge bg-success">Active</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                    <th>Member</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Sarah Williams</td>
                                                    <td>Unilevel</td>
                                                    <td>$125.00</td>
                                                    <td>{{ date('Y-m-d') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Brown</td>
                                                    <td>Binary</td>
                                                    <td>$250.50</td>
                                                    <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Emily Davis</td>
                                                    <td>Matrix</td>
                                                    <td>$180.25</td>
                                                    <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                                </tr>
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
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Quick Actions</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.verifications.index') }}" class="btn btn-primary">Pending Verifications</a>
                <!-- Add other admin actions here -->
            </div>
        </div>
    </div>
</div>
