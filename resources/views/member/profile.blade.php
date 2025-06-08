@extends('layouts.app')

@section('title', 'Member Profile')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">My Profile</h1>
    
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Personal Information</h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="https://via.placeholder.com/150" class="rounded-circle img-thumbnail" alt="Profile Picture">
                        <h4 class="mt-3">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h4>
                        <p class="text-muted">Member since {{ Auth::user()->created_at->format('M Y') }}</p>
                        <p><span class="badge bg-primary">{{ Auth::user()->rank }}</span></p>
                    </div>
                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Email
                            <span>{{ Auth::user()->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Phone
                            <span>{{ Auth::user()->phone }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Country
                            <span>{{ Auth::user()->country }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Status
                            <span class="badge bg-success">{{ Auth::user()->status }}</span>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="fas fa-edit me-1"></i> Edit Profile
                    </button>
                </div>
            </div>
        </div>
        
        <div class="col-md-8 mb-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Account Summary</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Wallet Balance</h6>
                                    <h3 class="card-text text-primary">$580</h3>
                                    <a href="{{ route('member.wallet.withdraw') }}" class="btn btn-sm btn-primary">Withdraw</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Direct Referrals</h6>
                                    <h3 class="card-text text-success">8</h3>
                                    <a href="{{ route('member.referrals') }}" class="btn btn-sm btn-success">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Total Team</h6>
                                    <h3 class="card-text text-info">42</h3>
                                    <a href="{{ route('member.genealogy') }}" class="btn btn-sm btn-info text-white">View Tree</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Referral Link</h5>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ url('/register') }}/{{ Auth::id() }}" id="referralLink" readonly>
                        <button class="btn btn-outline-secondary" type="button" onclick="copyReferralLink()">
                            <i class="fas fa-copy"></i> Copy
                        </button>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="mb-0"><small>Share this link to earn commissions when new members join.</small></p>
                        </div>
                        <div>
                            <a href="{{ route('member.referrals.links.generate') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus-circle me-1"></i> Generate Custom Links
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Security Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label d-block">Two-Factor Authentication</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="twoFactorToggle">
                            <label class="form-check-label" for="twoFactorToggle">Enable 2FA</label>
                        </div>
                        <small class="text-muted">Enhance your account security with two-factor authentication.</small>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span>Last changed: 30 days ago</span>
                            </div>
                            <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                Change Password
                            </button>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Login History</label>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span>Last login: Today at 10:45 AM</span>
                            </div>
                            <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#loginHistoryModal">
                                View History
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="profileFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="profileFirstName" value="{{ Auth::user()->first_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="profileLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="profileLastName" value="{{ Auth::user()->last_name }}">
                    </div>
                    <div class="mb-3">
                        <label for="profileEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="profileEmail" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="profilePhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="profilePhone" value="{{ Auth::user()->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="profileCountry" class="form-label">Country</label>
                        <select class="form-control" id="profileCountry">
                            <option value="United States" {{ Auth::user()->country == 'United States' ? 'selected' : '' }}>United States</option>
                            <option value="United Kingdom" {{ Auth::user()->country == 'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                            <option value="Canada" {{ Auth::user()->country == 'Canada' ? 'selected' : '' }}>Canada</option>
                            <option value="Australia" {{ Auth::user()->country == 'Australia' ? 'selected' : '' }}>Australia</option>
                            <option value="India" {{ Auth::user()->country == 'India' ? 'selected' : '' }}>India</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="profilePicture" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profilePicture">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="currentPassword" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword">
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="newPassword">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmPassword">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Update Password</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function copyReferralLink() {
        var copyText = document.getElementById("referralLink");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        
        // Show a temporary "Copied!" message
        var button = document.querySelector("#referralLink + button");
        var originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check"></i> Copied!';
        setTimeout(function() {
            button.innerHTML = originalText;
        }, 2000);
    }
</script>
@endsection
