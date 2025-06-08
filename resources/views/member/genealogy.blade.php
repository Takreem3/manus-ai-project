@extends('layouts.app')

@section('title', 'Genealogy Tree')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Genealogy Tree</h1>
    
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Your Network Structure</h5>
                        <div>
                            <button class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-expand-arrows-alt me-1"></i> Expand All
                            </button>
                            <button class="btn btn-sm btn-outline-secondary me-2">
                                <i class="fas fa-compress-arrows-alt me-1"></i> Collapse All
                            </button>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-info dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fas fa-filter me-1"></i> Filter
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">All Members</a></li>
                                    <li><a class="dropdown-item" href="#">Active Only</a></li>
                                    <li><a class="dropdown-item" href="#">Inactive Only</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Level 1 Only</a></li>
                                    <li><a class="dropdown-item" href="#">Level 2 Only</a></li>
                                    <li><a class="dropdown-item" href="#">Level 3 Only</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="genealogy-tree">
                        <div class="genealogy-tree-container" id="genealogyTree">
                            <!-- Tree will be rendered here by JavaScript -->
                            <div class="text-center p-5">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <p class="mt-3">Loading your genealogy tree...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Network Statistics</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>Members</th>
                                    <th>Active</th>
                                    <th>Sales Volume</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Level 1</td>
                                    <td>8</td>
                                    <td>7</td>
                                    <td>$3,200</td>
                                </tr>
                                <tr>
                                    <td>Level 2</td>
                                    <td>24</td>
                                    <td>18</td>
                                    <td>$8,500</td>
                                </tr>
                                <tr>
                                    <td>Level 3</td>
                                    <td>10</td>
                                    <td>6</td>
                                    <td>$2,800</td>
                                </tr>
                                <tr class="table-primary">
                                    <td><strong>Total</strong></td>
                                    <td><strong>42</strong></td>
                                    <td><strong>31</strong></td>
                                    <td><strong>$14,500</strong></td>
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
                    <h5 class="mb-0">Recent Joiners</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Joined</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Smith</td>
                                    <td>1</td>
                                    <td>May 15, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Mary Johnson</td>
                                    <td>1</td>
                                    <td>May 12, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Robert Williams</td>
                                    <td>2</td>
                                    <td>May 10, 2023</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>Lisa Brown</td>
                                    <td>2</td>
                                    <td>May 5, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Michael Davis</td>
                                    <td>3</td>
                                    <td>May 3, 2023</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .genealogy-tree {
        overflow: auto;
        white-space: nowrap;
        min-height: 400px;
        padding: 20px 0;
    }
    
    .genealogy-tree-container {
        min-width: 100%;
        min-height: 400px;
    }
    
    /* Tree node styles will be added by JavaScript */
    .tree-node {
        display: inline-block;
        vertical-align: top;
        text-align: center;
        padding: 10px;
        position: relative;
    }
    
    .tree-node-content {
        display: inline-block;
        width: 120px;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        background-color: #f8f9fa;
    }
    
    .tree-node-active {
        border-color: #28a745;
    }
    
    .tree-node-inactive {
        border-color: #dc3545;
        opacity: 0.7;
    }
    
    .tree-connector {
        position: absolute;
        height: 20px;
        border-left: 2px solid #ccc;
        z-index: 1;
    }
    
    .tree-horizontal-line {
        position: absolute;
        height: 2px;
        background-color: #ccc;
        z-index: 1;
    }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sample data for the genealogy tree
        const treeData = {
            id: 1,
            name: "You",
            image: "https://via.placeholder.com/50",
            status: "active",
            children: [
                {
                    id: 2,
                    name: "John Smith",
                    image: "https://via.placeholder.com/50",
                    status: "active",
                    children: [
                        {
                            id: 5,
                            name: "Robert Williams",
                            image: "https://via.placeholder.com/50",
                            status: "pending",
                            children: []
                        },
                        {
                            id: 6,
                            name: "Lisa Brown",
                            image: "https://via.placeholder.com/50",
                            status: "active",
                            children: []
                        }
                    ]
                },
                {
                    id: 3,
                    name: "Mary Johnson",
                    image: "https://via.placeholder.com/50",
                    status: "active",
                    children: [
                        {
                            id: 7,
                            name: "Michael Davis",
                            image: "https://via.placeholder.com/50",
                            status: "active",
                            children: []
                        }
                    ]
                },
                {
                    id: 4,
                    name: "James Wilson",
                    image: "https://via.placeholder.com/50",
                    status: "inactive",
                    children: []
                }
            ]
        };
        
        // Render the tree (simplified version)
        setTimeout(() => {
            const treeContainer = document.getElementById('genealogyTree');
            treeContainer.innerHTML = '<div class="alert alert-info">Genealogy tree visualization would be rendered here using a library like OrgChart.js or a custom implementation.</div>';
            
            // In a real implementation, you would use a library like OrgChart.js, Google Charts, or D3.js
            // to render an interactive tree visualization based on the treeData
        }, 1500);
    });
</script>
@endsection
