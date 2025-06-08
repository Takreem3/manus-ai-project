@extends('layouts.app')

@section('title', 'Commission Settings')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Commission Settings</h1>
    
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="commissionTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="unilevel-tab" data-bs-toggle="tab" data-bs-target="#unilevel" type="button" role="tab" aria-controls="unilevel" aria-selected="true">Unilevel Plan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="binary-tab" data-bs-toggle="tab" data-bs-target="#binary" type="button" role="tab" aria-controls="binary" aria-selected="false">Binary Plan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="matrix-tab" data-bs-toggle="tab" data-bs-target="#matrix" type="button" role="tab" aria-controls="matrix" aria-selected="false">Matrix Plan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="bonuses-tab" data-bs-toggle="tab" data-bs-target="#bonuses" type="button" role="tab" aria-controls="bonuses" aria-selected="false">Bonuses</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">General Settings</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="commissionTabsContent">
                        <!-- Unilevel Plan Tab -->
                        <div class="tab-pane fade show active" id="unilevel" role="tabpanel" aria-labelledby="unilevel-tab">
                            <div class="alert alert-info mb-4">
                                <i class="fas fa-info-circle me-2"></i> The Unilevel plan pays commissions on multiple levels of your downline organization with different percentages for each level.
                            </div>
                            
                            <form>
                                <div class="mb-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="enableUnilevel" checked>
                                        <label class="form-check-label" for="enableUnilevel">Enable Unilevel Commission Plan</label>
                                    </div>
                                </div>
                                
                                <div class="table-responsive mb-4">
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Level</th>
                                                <th>Commission Percentage</th>
                                                <th>Qualification</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Level 1 (Direct)</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="number" class="form-control" value="20" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select class="form-select form-select-sm">
                                                        <option value="none" selected>No Qualification</option>
                                                        <option value="active">Active Status</option>
                                                        <option value="rank">Specific Rank</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" disabled>
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Level 2</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="number" class="form-control" value="10" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select class="form-select form-select-sm">
                                                        <option value="none">No Qualification</option>
                                                        <option value="active" selected>Active Status</option>
                                                        <option value="rank">Specific Rank</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Level 3</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="number" class="form-control" value="5" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select class="form-select form-select-sm">
                                                        <option value="none">No Qualification</option>
                                                        <option value="active" selected>Active Status</option>
                                                        <option value="rank">Specific Rank</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Level 4</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="number" class="form-control" value="3" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select class="form-select form-select-sm">
                                                        <option value="none">No Qualification</option>
                                                        <option value="active">Active Status</option>
                                                        <option value="rank" selected>Specific Rank</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Level 5</td>
                                                <td>
                                                    <div class="input-group input-group-sm">
                                                        <input type="number" class="form-control" value="2" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select class="form-select form-select-sm">
                                                        <option value="none">No Qualification</option>
                                                        <option value="active">Active Status</option>
                                                        <option value="rank" selected>Specific Rank</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">
                                                    <button type="button" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-plus-circle me-1"></i> Add Level
                                                    </button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Compression Settings</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" id="dynamicCompression" checked>
                                                    <label class="form-check-label" for="dynamicCompression">
                                                        Enable Dynamic Compression
                                                    </label>
                                                    <small class="form-text text-muted d-block">Skips inactive members when calculating levels</small>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="infiniteCompression">
                                                    <label class="form-check-label" for="infiniteCompression">
                                                        Enable Infinite Compression
                                                    </label>
                                                    <small class="form-text text-muted d-block">Pays all levels regardless of depth until commission percentage reaches zero</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Limits & Caps</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="maxPayout" class="form-label">Maximum Monthly Payout</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">$</span>
                                                        <input type="number" class="form-control" id="maxPayout" value="10000">
                                                    </div>
                                                    <small class="form-text text-muted">Leave blank for no limit</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="maxPercentage" class="form-label">Maximum Total Percentage</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="maxPercentage" value="40">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                    <small class="form-text text-muted">Maximum total percentage across all levels</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary me-2">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Unilevel Settings</button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Binary Plan Tab -->
                        <div class="tab-pane fade" id="binary" role="tabpanel" aria-labelledby="binary-tab">
                            <div class="alert alert-info mb-4">
                                <i class="fas fa-info-circle me-2"></i> The Binary plan pays commissions based on the weaker leg's volume with a balanced structure of two legs (left and right).
                            </div>
                            
                            <form>
                                <div class="mb-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="enableBinary">
                                        <label class="form-check-label" for="enableBinary">Enable Binary Commission Plan</label>
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Binary Commission Settings</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="binaryPercentage" class="form-label">Commission Percentage</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="binaryPercentage" value="10" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                    <small class="form-text text-muted">Percentage paid on the weaker leg volume</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="binaryCapType" class="form-label">Cap Type</label>
                                                    <select class="form-select" id="binaryCapType">
                                                        <option value="percentage" selected>Percentage of Strong Leg</option>
                                                        <option value="fixed">Fixed Amount</option>
                                                        <option value="none">No Cap</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="binaryCapValue" class="form-label">Cap Value</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="binaryCapValue" value="50" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                    <small class="form-text text-muted">Maximum percentage of strong leg that can be paid out</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="binaryCycleAmount" class="form-label">Cycle Amount</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">$</span>
                                                        <input type="number" class="form-control" id="binaryCycleAmount" value="300">
                                                    </div>
                                                    <small class="form-text text-muted">Volume required to complete one cycle</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="binaryMaxCycles" class="form-label">Maximum Daily Cycles</label>
                                                    <input type="number" class="form-control" id="binaryMaxCycles" value="10" min="1">
                                                    <small class="form-text text-muted">Maximum number of cycles paid per day</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Carry Forward Settings</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="enableCarryForward" checked>
                                                    <label class="form-check-label" for="enableCarryForward">
                                                        Enable Volume Carry Forward
                                                    </label>
                                                    <small class="form-text text-muted d-block">Unused volume carries forward to the next period</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="carryForwardExpiry" class="form-label">Carry Forward Expiry</label>
                                                    <select class="form-select" id="carryForwardExpiry">
                                                        <option value="never" selected>Never Expires</option>
                                                        <option value="weekly">Weekly</option>
                                                        <option value="monthly">Monthly</option>
                                                        <option value="quarterly">Quarterly</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="carryForwardLimit" class="form-label">Carry Forward Limit</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">$</span>
                                                        <input type="number" class="form-control" id="carryForwardLimit" value="10000">
                                                    </div>
                                                    <small class="form-text text-muted">Maximum volume that can be carried forward (leave blank for no limit)</small>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="flushVolume">
                                                    <label class="form-check-label" for="flushVolume">
                                                        Flush Volume on Inactivity
                                                    </label>
                                                    <small class="form-text text-muted d-block">Reset accumulated volume if member becomes inactive</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary me-2">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Binary Settings</button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Matrix Plan Tab -->
                        <div class="tab-pane fade" id="matrix" role="tabpanel" aria-labelledby="matrix-tab">
                            <div class="alert alert-info mb-4">
                                <i class="fas fa-info-circle me-2"></i> The Matrix plan pays commissions on a fixed width and depth structure (e.g., 3x7 matrix = 3 width, 7 levels deep).
                            </div>
                            
                            <form>
                                <div class="mb-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="enableMatrix">
                                        <label class="form-check-label" for="enableMatrix">Enable Matrix Commission Plan</label>
                                    </div>
                                </div>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Matrix Structure</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="matrixWidth" class="form-label">Matrix Width</label>
                                                    <select class="form-select" id="matrixWidth">
                                                        <option value="2">2 (Binary)</option>
                                                        <option value="3" selected>3 (Ternary)</option>
                                                        <option value="4">4 (Quaternary)</option>
                                                        <option value="5">5 (Quinary)</option>
                                                    </select>
                                                    <small class="form-text text-muted">Maximum number of frontline members</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="matrixDepth" class="form-label">Matrix Depth</label>
                                                    <select class="form-select" id="matrixDepth">
                                                        <option value="3">3 Levels</option>
                                                        <option value="5">5 Levels</option>
                                                        <option value="7" selected>7 Levels</option>
                                                        <option value="10">10 Levels</option>
                                                    </select>
                                                    <small class="form-text text-muted">Maximum depth of the matrix</small>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="matrixForceSpill" checked>
                                                    <label class="form-check-label" for="matrixForceSpill">
                                                        Enable Force Spillover
                                                    </label>
                                                    <small class="form-text text-muted d-block">New members will be placed under the first available position</small>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="matrixAllowEmpty">
                                                    <label class="form-check-label" for="matrixAllowEmpty">
                                                        Allow Empty Positions
                                                    </label>
                                                    <small class="form-text text-muted d-block">If unchecked, matrix will be filled from left to right with no gaps</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Matrix Commission Percentages</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>Level</th>
                                                                <th>Commission Percentage</th>
                                                                <th>Qualification</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Level 1</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="number" class="form-control" value="10" min="0" max="100">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select class="form-select form-select-sm">
                                                                        <option value="none" selected>No Qualification</option>
                                                                        <option value="active">Active Status</option>
                                                                        <option value="rank">Specific Rank</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 2</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="number" class="form-control" value="8" min="0" max="100">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select class="form-select form-select-sm">
                                                                        <option value="none">No Qualification</option>
                                                                        <option value="active" selected>Active Status</option>
                                                                        <option value="rank">Specific Rank</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 3</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="number" class="form-control" value="6" min="0" max="100">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select class="form-select form-select-sm">
                                                                        <option value="none">No Qualification</option>
                                                                        <option value="active" selected>Active Status</option>
                                                                        <option value="rank">Specific Rank</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 4</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="number" class="form-control" value="4" min="0" max="100">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select class="form-select form-select-sm">
                                                                        <option value="none">No Qualification</option>
                                                                        <option value="active">Active Status</option>
                                                                        <option value="rank" selected>Specific Rank</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 5</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="number" class="form-control" value="3" min="0" max="100">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select class="form-select form-select-sm">
                                                                        <option value="none">No Qualification</option>
                                                                        <option value="active">Active Status</option>
                                                                        <option value="rank" selected>Specific Rank</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 6</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="number" class="form-control" value="2" min="0" max="100">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select class="form-select form-select-sm">
                                                                        <option value="none">No Qualification</option>
                                                                        <option value="active">Active Status</option>
                                                                        <option value="rank" selected>Specific Rank</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Level 7</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="number" class="form-control" value="1" min="0" max="100">
                                                                        <span class="input-group-text">%</span>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <select class="form-select form-select-sm">
                                                                        <option value="none">No Qualification</option>
                                                                        <option value="active">Active Status</option>
                                                                        <option value="rank" selected>Specific Rank</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary me-2">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Matrix Settings</button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Bonuses Tab -->
                        <div class="tab-pane fade" id="bonuses" role="tabpanel" aria-labelledby="bonuses-tab">
                            <div class="alert alert-info mb-4">
                                <i class="fas fa-info-circle me-2"></i> Configure additional bonuses to reward specific achievements and behaviors in your MLM organization.
                            </div>
                            
                            <form>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">Fast Start Bonus</h6>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="enableFastStart" checked>
                                                        <label class="form-check-label" for="enableFastStart"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p class="text-muted small">Rewards sponsors for enrolling new members within their first 30 days.</p>
                                                <div class="mb-3">
                                                    <label for="fastStartPercentage" class="form-label">Bonus Percentage</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="fastStartPercentage" value="20" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fastStartDays" class="form-label">Qualification Period (Days)</label>
                                                    <input type="number" class="form-control" id="fastStartDays" value="30" min="1">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fastStartLimit" class="form-label">Maximum Bonus Amount</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">$</span>
                                                        <input type="number" class="form-control" id="fastStartLimit" value="500">
                                                    </div>
                                                    <small class="form-text text-muted">Leave blank for no limit</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">Matching Bonus</h6>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="enableMatching" checked>
                                                        <label class="form-check-label" for="enableMatching"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p class="text-muted small">Pays a percentage of commissions earned by personally sponsored members.</p>
                                                <div class="mb-3">
                                                    <label for="matchingPercentage" class="form-label">Matching Percentage</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="matchingPercentage" value="25" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="matchingLevels" class="form-label">Matching Levels</label>
                                                    <select class="form-select" id="matchingLevels">
                                                        <option value="1">1 Level</option>
                                                        <option value="2" selected>2 Levels</option>
                                                        <option value="3">3 Levels</option>
                                                        <option value="4">4 Levels</option>
                                                        <option value="5">5 Levels</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="matchingQualification" class="form-label">Qualification</label>
                                                    <select class="form-select" id="matchingQualification">
                                                        <option value="none">No Qualification</option>
                                                        <option value="active" selected>Active Status</option>
                                                        <option value="rank">Specific Rank</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">Rank Achievement Bonus</h6>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="enableRankBonus">
                                                        <label class="form-check-label" for="enableRankBonus"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p class="text-muted small">One-time bonus paid when members achieve specific ranks.</p>
                                                <div class="table-responsive">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>Rank</th>
                                                                <th>Bonus Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Bronze</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <span class="input-group-text">$</span>
                                                                        <input type="number" class="form-control" value="100">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Silver</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <span class="input-group-text">$</span>
                                                                        <input type="number" class="form-control" value="250">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Gold</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <span class="input-group-text">$</span>
                                                                        <input type="number" class="form-control" value="500">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Platinum</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <span class="input-group-text">$</span>
                                                                        <input type="number" class="form-control" value="1000">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Diamond</td>
                                                                <td>
                                                                    <div class="input-group input-group-sm">
                                                                        <span class="input-group-text">$</span>
                                                                        <input type="number" class="form-control" value="2500">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h6 class="mb-0">Leadership Pool</h6>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="enableLeadershipPool">
                                                        <label class="form-check-label" for="enableLeadershipPool"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p class="text-muted small">Shares a percentage of company volume among qualified leaders.</p>
                                                <div class="mb-3">
                                                    <label for="poolPercentage" class="form-label">Pool Percentage</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="poolPercentage" value="2" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                    <small class="form-text text-muted">Percentage of company volume allocated to the pool</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="poolQualification" class="form-label">Qualification Rank</label>
                                                    <select class="form-select" id="poolQualification">
                                                        <option value="gold">Gold</option>
                                                        <option value="platinum" selected>Platinum</option>
                                                        <option value="diamond">Diamond</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="poolFrequency" class="form-label">Distribution Frequency</label>
                                                    <select class="form-select" id="poolFrequency">
                                                        <option value="weekly">Weekly</option>
                                                        <option value="monthly" selected>Monthly</option>
                                                        <option value="quarterly">Quarterly</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary me-2">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Bonus Settings</button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- General Settings Tab -->
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="alert alert-info mb-4">
                                <i class="fas fa-info-circle me-2"></i> Configure general commission settings that apply to all commission plans.
                            </div>
                            
                            <form>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Calculation Settings</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="calculationFrequency" class="form-label">Calculation Frequency</label>
                                                    <select class="form-select" id="calculationFrequency">
                                                        <option value="daily">Daily</option>
                                                        <option value="weekly" selected>Weekly</option>
                                                        <option value="monthly">Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="calculationDay" class="form-label">Calculation Day</label>
                                                    <select class="form-select" id="calculationDay">
                                                        <option value="1">Monday</option>
                                                        <option value="2">Tuesday</option>
                                                        <option value="3">Wednesday</option>
                                                        <option value="4">Thursday</option>
                                                        <option value="5">Friday</option>
                                                        <option value="6">Saturday</option>
                                                        <option value="0" selected>Sunday</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="calculationTime" class="form-label">Calculation Time</label>
                                                    <input type="time" class="form-control" id="calculationTime" value="00:00">
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="autoApprove" checked>
                                                    <label class="form-check-label" for="autoApprove">
                                                        Auto-approve Commissions
                                                    </label>
                                                    <small class="form-text text-muted d-block">If unchecked, commissions require manual approval</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Payout Settings</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="payoutFrequency" class="form-label">Payout Frequency</label>
                                                    <select class="form-select" id="payoutFrequency">
                                                        <option value="weekly">Weekly</option>
                                                        <option value="biweekly">Bi-weekly</option>
                                                        <option value="monthly" selected>Monthly</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="minimumPayout" class="form-label">Minimum Payout Amount</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">$</span>
                                                        <input type="number" class="form-control" id="minimumPayout" value="50">
                                                    </div>
                                                    <small class="form-text text-muted">Minimum amount required for payout processing</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="holdingPeriod" class="form-label">Holding Period (Days)</label>
                                                    <input type="number" class="form-control" id="holdingPeriod" value="14" min="0">
                                                    <small class="form-text text-muted">Days to hold commissions before eligible for payout</small>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="autoPayout" checked>
                                                    <label class="form-check-label" for="autoPayout">
                                                        Auto-process Payouts
                                                    </label>
                                                    <small class="form-text text-muted d-block">If unchecked, payouts require manual processing</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Qualification Settings</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <label for="activeDefinition" class="form-label">Active Status Definition</label>
                                                    <select class="form-select" id="activeDefinition">
                                                        <option value="personal_order">Personal Order</option>
                                                        <option value="personal_volume" selected>Personal Volume</option>
                                                        <option value="autoship">Active Autoship</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="activeAmount" class="form-label">Active Status Requirement</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">$</span>
                                                        <input type="number" class="form-control" id="activeAmount" value="100">
                                                    </div>
                                                    <small class="form-text text-muted">Minimum amount required to maintain active status</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="activePeriod" class="form-label">Active Status Period</label>
                                                    <select class="form-select" id="activePeriod">
                                                        <option value="30">30 Days</option>
                                                        <option value="60">60 Days</option>
                                                        <option value="90">90 Days</option>
                                                    </select>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="graceActive" checked>
                                                    <label class="form-check-label" for="graceActive">
                                                        Enable Grace Period
                                                    </label>
                                                    <small class="form-text text-muted d-block">Allow a grace period before changing active status</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">Tax Settings</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="witholdTax" checked>
                                                    <label class="form-check-label" for="witholdTax">
                                                        Withhold Taxes
                                                    </label>
                                                    <small class="form-text text-muted d-block">Automatically withhold taxes from commission payments</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="defaultTaxRate" class="form-label">Default Tax Rate</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="defaultTaxRate" value="15" min="0" max="100">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                    <small class="form-text text-muted">Default rate when no specific tax information is provided</small>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="taxFormThreshold" class="form-label">Tax Form Threshold</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">$</span>
                                                        <input type="number" class="form-control" id="taxFormThreshold" value="600">
                                                    </div>
                                                    <small class="form-text text-muted">Annual earnings threshold for tax form generation</small>
                                                </div>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" type="checkbox" id="autoGenerateTaxForms" checked>
                                                    <label class="form-check-label" for="autoGenerateTaxForms">
                                                        Auto-generate Tax Forms
                                                    </label>
                                                    <small class="form-text text-muted d-block">Automatically generate tax forms at year end</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary me-2">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save General Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Bootstrap tabs
        var triggerTabList = [].slice.call(document.querySelectorAll('#commissionTabs button'))
        triggerTabList.forEach(function (triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)
            triggerEl.addEventListener('click', function (event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })
    });
</script>
@endsection
