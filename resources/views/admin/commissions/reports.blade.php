@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Commission Reports</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="daily-tab" data-bs-toggle="tab" data-bs-target="#daily" type="button" role="tab" aria-controls="daily" aria-selected="true">Daily</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="weekly-tab" data-bs-toggle="tab" data-bs-target="#weekly" type="button" role="tab" aria-controls="weekly" aria-selected="false">Weekly</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="monthly-tab" data-bs-toggle="tab" data-bs-target="#monthly" type="button" role="tab" aria-controls="monthly" aria-selected="false">Monthly</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="daily" role="tabpanel" aria-labelledby="daily-tab">
                            <div class="table-responsive mt-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Total Commissions</th>
                                            <th>Number of Transactions</th>
                                            <th>Average Commission</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ date('Y-m-d') }}</td>
                                            <td>$1,250.00</td>
                                            <td>42</td>
                                            <td>$29.76</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View Details</a></td>
                                        </tr>
                                        <tr>
                                            <td>{{ date('Y-m-d', strtotime('-1 day')) }}</td>
                                            <td>$980.50</td>
                                            <td>35</td>
                                            <td>$28.01</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View Details</a></td>
                                        </tr>
                                        <tr>
                                            <td>{{ date('Y-m-d', strtotime('-2 days')) }}</td>
                                            <td>$1,105.75</td>
                                            <td>38</td>
                                            <td>$29.10</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View Details</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
                            <div class="table-responsive mt-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Week</th>
                                            <th>Total Commissions</th>
                                            <th>Number of Transactions</th>
                                            <th>Average Commission</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Week {{ date('W') }}</td>
                                            <td>$8,750.25</td>
                                            <td>295</td>
                                            <td>$29.66</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View Details</a></td>
                                        </tr>
                                        <tr>
                                            <td>Week {{ date('W', strtotime('-1 week')) }}</td>
                                            <td>$7,980.50</td>
                                            <td>270</td>
                                            <td>$29.56</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View Details</a></td>
                                        </tr>
                                        <tr>
                                            <td>Week {{ date('W', strtotime('-2 weeks')) }}</td>
                                            <td>$8,105.75</td>
                                            <td>285</td>
                                            <td>$28.44</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View Details</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                            <div class="table-responsive mt-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Total Commissions</th>
                                            <th>Number of Transactions</th>
                                            <th>Average Commission</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ date('F Y') }}</td>
                                            <td>$35,250.75</td>
                                            <td>1,185</td>
                                            <td>$29.75</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View Details</a></td>
                                        </tr>
                                        <tr>
                                            <td>{{ date('F Y', strtotime('-1 month')) }}</td>
                                            <td>$32,980.50</td>
                                            <td>1,120</td>
                                            <td>$29.45</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View Details</a></td>
                                        </tr>
                                        <tr>
                                            <td>{{ date('F Y', strtotime('-2 months')) }}</td>
                                            <td>$33,105.75</td>
                                            <td>1,150</td>
                                            <td>$28.79</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">View Details</a></td>
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
@endsection
