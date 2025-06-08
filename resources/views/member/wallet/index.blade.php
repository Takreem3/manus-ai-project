@extends('layouts.app')

@section('title', 'My Wallet')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">My Wallet</h1>
    
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Wallet Balance</h5>
                </div>
                <div class="card-body text-center">
                    <h2 class="display-4 text-primary">$580.00</h2>
                    <p class="text-muted">Available for withdrawal</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#withdrawModal">
                        <i class="fas fa-money-bill-wave me-2"></i> Withdraw Funds
                    </button>
                </div>
            </div>
            
            <div class="card mt-4">
                <div class="card-header">
                    <h5 class="mb-0">Payment Methods</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <i class="fab fa-paypal fa-lg me-3"></i>
                                    <strong>PayPal</strong>
                                </div>
                                <span class="badge bg-light text-dark">Default</span>
                            </div>
                            <small class="d-block mt-1">user@example.com</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-university fa-lg me-3"></i>
                                    <strong>Bank Transfer</strong>
                                </div>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </div>
                            <small class="d-block mt-1">XXXX-XXXX-XXXX-1234</small>
                        </a>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-secondary w-100" data-bs-toggle="modal" data-bs-target="#addPaymentMethodModal">
                            <i class="fas fa-plus-circle me-1"></i> Add Payment Method
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Transaction History</h5>
                        <div>
                            <div class="input-group input-group-sm">
                                <select class="form-select" id="transactionType">
                                    <option value="all" selected>All Transactions</option>
                                    <option value="commission">Commissions</option>
                                    <option value="withdrawal">Withdrawals</option>
                                    <option value="bonus">Bonuses</option>
                                </select>
                                <button class="btn btn-outline-secondary" type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>May 28, 2023</td>
                                    <td>Commission: Direct Sale</td>
                                    <td>Credit</td>
                                    <td class="text-success">+$100.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>May 25, 2023</td>
                                    <td>Commission: Level Bonus</td>
                                    <td>Credit</td>
                                    <td class="text-success">+$50.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>May 22, 2023</td>
                                    <td>Commission: Matching Bonus</td>
                                    <td>Credit</td>
                                    <td class="text-success">+$25.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>May 20, 2023</td>
                                    <td>Commission: Level Bonus</td>
                                    <td>Credit</td>
                                    <td class="text-success">+$30.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>May 18, 2023</td>
                                    <td>Commission: Direct Sale</td>
                                    <td>Credit</td>
                                    <td class="text-success">+$50.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>May 15, 2023</td>
                                    <td>Commission: Level Bonus</td>
                                    <td>Credit</td>
                                    <td class="text-success">+$25.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>May 12, 2023</td>
                                    <td>Commission: Fast Start Bonus</td>
                                    <td>Credit</td>
                                    <td class="text-success">+$40.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>Apr 30, 2023</td>
                                    <td>Withdrawal: PayPal</td>
                                    <td>Debit</td>
                                    <td class="text-danger">-$250.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>Apr 28, 2023</td>
                                    <td>Commission: Direct Sale</td>
                                    <td>Credit</td>
                                    <td class="text-success">+$75.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>Apr 25, 2023</td>
                                    <td>Commission: Level Bonus</td>
                                    <td>Credit</td>
                                    <td class="text-success">+$35.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <nav>
                        <ul class="pagination pagination-sm justify-content-center mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Earnings Overview</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="earningsChart" width="100%" height="250"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Upcoming Payouts</h5>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i> Next payout processing: June 1, 2023
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Jun 1, 2023</td>
                                            <td>Monthly Commission</td>
                                            <td>$320.00</td>
                                        </tr>
                                        <tr>
                                            <td>Jun 5, 2023</td>
                                            <td>Rank Achievement Bonus</td>
                                            <td>$100.00</td>
                                        </tr>
                                        <tr>
                                            <td>Jun 10, 2023</td>
                                            <td>Team Performance Bonus</td>
                                            <td>$75.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="table-primary">
                                            <th colspan="2">Estimated Total</th>
                                            <th>$495.00</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Withdraw Modal -->
<div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="withdrawModalLabel">Withdraw Funds</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="withdrawAmount" class="form-label">Amount to Withdraw</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="withdrawAmount" min="50" max="580" value="100">
                        </div>
                        <small class="text-muted">Minimum withdrawal: $50.00. Available balance: $580.00</small>
                    </div>
                    <div class="mb-3">
                        <label for="withdrawMethod" class="form-label">Payment Method</label>
                        <select class="form-select" id="withdrawMethod">
                            <option value="paypal" selected>PayPal (user@example.com)</option>
                            <option value="bank">Bank Transfer (XXXX-XXXX-XXXX-1234)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="withdrawNotes" class="form-label">Notes (Optional)</label>
                        <textarea class="form-control" id="withdrawNotes" rows="2"></textarea>
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> Withdrawals are typically processed within 3-5 business days.
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm Withdrawal</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Payment Method Modal -->
<div class="modal fade" id="addPaymentMethodModal" tabindex="-1" aria-labelledby="addPaymentMethodModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentMethodModalLabel">Add Payment Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="paymentType" class="form-label">Payment Type</label>
                        <select class="form-select" id="paymentType">
                            <option value="paypal">PayPal</option>
                            <option value="bank">Bank Account</option>
                            <option value="crypto">Cryptocurrency</option>
                        </select>
                    </div>
                    
                    <div id="paypalFields">
                        <div class="mb-3">
                            <label for="paypalEmail" class="form-label">PayPal Email</label>
                            <input type="email" class="form-control" id="paypalEmail">
                        </div>
                    </div>
                    
                    <div id="bankFields" style="display: none;">
                        <div class="mb-3">
                            <label for="accountName" class="form-label">Account Holder Name</label>
                            <input type="text" class="form-control" id="accountName">
                        </div>
                        <div class="mb-3">
                            <label for="accountNumber" class="form-label">Account Number</label>
                            <input type="text" class="form-control" id="accountNumber">
                        </div>
                        <div class="mb-3">
                            <label for="routingNumber" class="form-label">Routing Number</label>
                            <input type="text" class="form-control" id="routingNumber">
                        </div>
                        <div class="mb-3">
                            <label for="bankName" class="form-label">Bank Name</label>
                            <input type="text" class="form-control" id="bankName">
                        </div>
                    </div>
                    
                    <div id="cryptoFields" style="display: none;">
                        <div class="mb-3">
                            <label for="cryptoType" class="form-label">Cryptocurrency</label>
                            <select class="form-select" id="cryptoType">
                                <option value="btc">Bitcoin (BTC)</option>
                                <option value="eth">Ethereum (ETH)</option>
                                <option value="usdt">Tether (USDT)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="walletAddress" class="form-label">Wallet Address</label>
                            <input type="text" class="form-control" id="walletAddress">
                        </div>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="defaultPaymentMethod">
                        <label class="form-check-label" for="defaultPaymentMethod">
                            Set as default payment method
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Payment Method</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Earnings Chart
        var ctx = document.getElementById('earningsChart').getContext('2d');
        var earningsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Monthly Earnings',
                    data: [150, 220, 180, 280, 320],
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return '$' + context.parsed.y;
                            }
                        }
                    }
                }
            }
        });
        
        // Payment method type toggle
        document.getElementById('paymentType').addEventListener('change', function() {
            const type = this.value;
            document.getElementById('paypalFields').style.display = type === 'paypal' ? 'block' : 'none';
            document.getElementById('bankFields').style.display = type === 'bank' ? 'block' : 'none';
            document.getElementById('cryptoFields').style.display = type === 'crypto' ? 'block' : 'none';
        });
    });
</script>
@endsection
