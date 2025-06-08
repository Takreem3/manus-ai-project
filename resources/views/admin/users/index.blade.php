@extends('layouts.app')

@section('title', 'User Management')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">User Management</h1>
    
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Users</h5>
                        <div>
                            <button class="btn btn-sm btn-success me-2" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                <i class="fas fa-plus-circle me-1"></i> Add User
                            </button>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fas fa-download me-1"></i> Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">CSV</a></li>
                                    <li><a class="dropdown-item" href="#">Excel</a></li>
                                    <li><a class="dropdown-item" href="#">PDF</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" placeholder="Search users...">
                                <button class="btn btn-sm btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select class="form-select form-select-sm">
                                <option value="">All Roles</option>
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <select class="form-select form-select-sm">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="pending">Pending</option>
                                <option value="blocked">Blocked</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <button class="btn btn-sm btn-outline-primary w-100">
                                <i class="fas fa-filter me-1"></i> Apply Filters
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                            <label class="form-check-label" for="selectAll"></label>
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Referrals</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </td>
                                    <td>John Smith</td>
                                    <td>john.smith@example.com</td>
                                    <td><span class="badge bg-primary">Member</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>May 15, 2023</td>
                                    <td>3</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Block">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </td>
                                    <td>Mary Johnson</td>
                                    <td>mary.johnson@example.com</td>
                                    <td><span class="badge bg-primary">Member</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>May 12, 2023</td>
                                    <td>1</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Block">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </td>
                                    <td>Robert Williams</td>
                                    <td>robert.williams@example.com</td>
                                    <td><span class="badge bg-primary">Member</span></td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>May 10, 2023</td>
                                    <td>0</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Approve">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </td>
                                    <td>Lisa Brown</td>
                                    <td>lisa.brown@example.com</td>
                                    <td><span class="badge bg-primary">Member</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>May 5, 2023</td>
                                    <td>2</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Block">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </td>
                                    <td>James Wilson</td>
                                    <td>james.wilson@example.com</td>
                                    <td><span class="badge bg-primary">Member</span></td>
                                    <td><span class="badge bg-danger">Blocked</span></td>
                                    <td>May 3, 2023</td>
                                    <td>0</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" data-bs-toggle="tooltip" title="Unblock">
                                                <i class="fas fa-unlock"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox">
                                            <label class="form-check-label"></label>
                                        </div>
                                    </td>
                                    <td>Admin User</td>
                                    <td>admin@example.com</td>
                                    <td><span class="badge bg-danger">Admin</span></td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>Jan 1, 2023</td>
                                    <td>0</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="tooltip" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span>Showing 1 to 6 of 125 entries</span>
                        </div>
                        <nav>
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">User Statistics</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Total Users</h6>
                                    <h3 class="card-text text-primary">125</h3>
                                    <small class="text-muted">12 new this month</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Active Users</h6>
                                    <h3 class="card-text text-success">98</h3>
                                    <small class="text-muted">78.4% of total</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Pending Users</h6>
                                    <h3 class="card-text text-warning">15</h3>
                                    <small class="text-muted">12% of total</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Blocked Users</h6>
                                    <h3 class="card-text text-danger">12</h3>
                                    <small class="text-muted">9.6% of total</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <canvas id="userStatsChart" width="100%" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Recent Activities</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">New user registered</h6>
                                <small>3 mins ago</small>
                            </div>
                            <p class="mb-1">Robert Williams registered as a new member.</p>
                            <small class="text-muted">IP: 192.168.1.105</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">User blocked</h6>
                                <small>1 hour ago</small>
                            </div>
                            <p class="mb-1">James Wilson was blocked due to suspicious activity.</p>
                            <small class="text-muted">By: Admin User</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">User role changed</h6>
                                <small>2 hours ago</small>
                            </div>
                            <p class="mb-1">Emily Davis was promoted to Team Leader.</p>
                            <small class="text-muted">By: Admin User</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Password reset</h6>
                                <small>5 hours ago</small>
                            </div>
                            <p class="mb-1">Michael Brown requested a password reset.</p>
                            <small class="text-muted">IP: 192.168.1.87</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">User approved</h6>
                                <small>1 day ago</small>
                            </div>
                            <p class="mb-1">Lisa Brown's account was approved.</p>
                            <small class="text-muted">By: Admin User</small>
                        </a>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="#" class="btn btn-sm btn-outline-primary">View All Activities</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="member" selected>Member</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="sponsor" class="form-label">Sponsor (Optional)</label>
                        <select class="form-select" id="sponsor">
                            <option value="">No Sponsor</option>
                            <option value="1">John Smith</option>
                            <option value="2">Mary Johnson</option>
                            <option value="3">Lisa Brown</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sendWelcomeEmail" checked>
                            <label class="form-check-label" for="sendWelcomeEmail">
                                Send welcome email
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add User</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Select all checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            var checkboxes = document.querySelectorAll('tbody .form-check-input');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        });
        
        // User Stats Chart
        var ctx = document.getElementById('userStatsChart').getContext('2d');
        var userStatsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'New Users',
                    data: [15, 22, 18, 25, 12],
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });
</script>
@endsection
