@extends('layouts.app')

@section('title', 'My Referrals')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">My Referrals</h1>
    
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Referral Links</h5>
                        <div>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createLinkModal">
                                <i class="fas fa-plus-circle me-1"></i> Create New Link
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> Share your referral links to earn commissions when new members join through your link.
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Clicks</th>
                                    <th>Signups</th>
                                    <th>Conversion</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Default Link</td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" value="{{ url('/register') }}/{{ Auth::id() }}" id="defaultLink" readonly>
                                            <button class="btn btn-outline-secondary" type="button" onclick="copyLink('defaultLink')">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>124</td>
                                    <td>8</td>
                                    <td>6.5%</td>
                                    <td>Account Creation</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="shareLink('defaultLink')">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Facebook Campaign</td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" value="{{ url('/register') }}/{{ Auth::id() }}?src=fb" id="fbLink" readonly>
                                            <button class="btn btn-outline-secondary" type="button" onclick="copyLink('fbLink')">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>87</td>
                                    <td>5</td>
                                    <td>5.7%</td>
                                    <td>May 10, 2023</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="shareLink('fbLink')">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Instagram Bio</td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" value="{{ url('/register') }}/{{ Auth::id() }}?src=ig" id="igLink" readonly>
                                            <button class="btn btn-outline-secondary" type="button" onclick="copyLink('igLink')">
                                                <i class="fas fa-copy"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td>56</td>
                                    <td>3</td>
                                    <td>5.4%</td>
                                    <td>May 15, 2023</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" onclick="shareLink('igLink')">
                                            <i class="fas fa-share-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">My Direct Referrals</h5>
                        <div>
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search referrals...">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Joined</th>
                                    <th>Status</th>
                                    <th>Sales</th>
                                    <th>Team Size</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Smith</td>
                                    <td>john.smith@example.com</td>
                                    <td>May 15, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$1,250</td>
                                    <td>3</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mary Johnson</td>
                                    <td>mary.johnson@example.com</td>
                                    <td>May 12, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$950</td>
                                    <td>1</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Robert Williams</td>
                                    <td>robert.williams@example.com</td>
                                    <td>May 10, 2023</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>$0</td>
                                    <td>0</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Lisa Brown</td>
                                    <td>lisa.brown@example.com</td>
                                    <td>May 5, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$750</td>
                                    <td>2</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>James Wilson</td>
                                    <td>james.wilson@example.com</td>
                                    <td>May 3, 2023</td>
                                    <td><span class="badge bg-danger">Inactive</span></td>
                                    <td>$250</td>
                                    <td>0</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Emily Davis</td>
                                    <td>emily.davis@example.com</td>
                                    <td>Apr 28, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$1,100</td>
                                    <td>4</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Michael Brown</td>
                                    <td>michael.brown@example.com</td>
                                    <td>Apr 25, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$850</td>
                                    <td>2</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sarah Wilson</td>
                                    <td>sarah.wilson@example.com</td>
                                    <td>Apr 20, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$950</td>
                                    <td>3</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="View Profile">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="Send Message">
                                            <i class="fas fa-envelope"></i>
                                        </button>
                                    </td>
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
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Referral Statistics</h5>
                </div>
                <div class="card-body">
                    <canvas id="referralChart" width="100%" height="250"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Marketing Materials</h5>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Product Brochure</h6>
                                <small>PDF, 2.5 MB</small>
                            </div>
                            <p class="mb-1">Comprehensive guide to our product offerings and benefits.</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Compensation Plan Overview</h6>
                                <small>PDF, 1.8 MB</small>
                            </div>
                            <p class="mb-1">Detailed explanation of our MLM compensation structure.</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Social Media Graphics Pack</h6>
                                <small>ZIP, 15 MB</small>
                            </div>
                            <p class="mb-1">Ready-to-use graphics for Facebook, Instagram, and Twitter.</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Email Templates</h6>
                                <small>ZIP, 500 KB</small>
                            </div>
                            <p class="mb-1">Pre-written email templates for recruiting and follow-ups.</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Presentation Slides</h6>
                                <small>PPTX, 5 MB</small>
                            </div>
                            <p class="mb-1">Professional slides for opportunity presentations.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Link Modal -->
<div class="modal fade" id="createLinkModal" tabindex="-1" aria-labelledby="createLinkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createLinkModalLabel">Create New Referral Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="linkName" class="form-label">Link Name</label>
                        <input type="text" class="form-control" id="linkName" placeholder="e.g., YouTube Campaign">
                        <small class="text-muted">Give your link a name to help you track its performance.</small>
                    </div>
                    <div class="mb-3">
                        <label for="linkSource" class="form-label">Source Parameter</label>
                        <div class="input-group">
                            <span class="input-group-text">src=</span>
                            <input type="text" class="form-control" id="linkSource" placeholder="e.g., youtube">
                        </div>
                        <small class="text-muted">This helps track where your referrals are coming from.</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Landing Page</label>
                        <select class="form-select">
                            <option value="register" selected>Registration Page</option>
                            <option value="products">Products Page</option>
                            <option value="opportunity">Opportunity Page</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Create Link</button>
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
        
        // Referral Chart
        var ctx = document.getElementById('referralChart').getContext('2d');
        var referralChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Clicks',
                    data: [45, 62, 78, 95, 124],
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }, {
                    label: 'Signups',
                    data: [2, 3, 4, 6, 8],
                    backgroundColor: 'rgba(40, 167, 69, 0.5)',
                    borderColor: 'rgba(40, 167, 69, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
    
    function copyLink(id) {
        var copyText = document.getElementById(id);
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        
        // Show a temporary "Copied!" message
        var button = document.querySelector("#" + id + " + button");
        var originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(function() {
            button.innerHTML = originalText;
        }, 2000);
    }
    
    function shareLink(id) {
        var link = document.getElementById(id).value;
        
        // Check if Web Share API is supported
        if (navigator.share) {
            navigator.share({
                title: 'Join Our MLM Program',
                text: 'Check out this amazing opportunity!',
                url: link,
            })
            .then(() => console.log('Successful share'))
            .catch((error) => console.log('Error sharing', error));
        } else {
            // Fallback for browsers that don't support Web Share API
            alert('Copy this link to share: ' + link);
        }
    }
</script>
@endsection
