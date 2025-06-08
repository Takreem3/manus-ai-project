@extends('layouts.app')

@section('title', 'Commission Calculator')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Commission Calculator</h1>
    
    <div class="row">
        <div class="col-md-5 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Input Parameters</h5>
                </div>
                <div class="card-body">
                    <form id="calculatorForm">
                        <div class="mb-3">
                            <label for="commissionPlan" class="form-label">Commission Plan</label>
                            <select class="form-select" id="commissionPlan">
                                <option value="unilevel">Unilevel Plan</option>
                                <option value="binary">Binary Plan</option>
                                <option value="matrix">Matrix Plan (3x3)</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="personalSales" class="form-label">Personal Sales ($)</label>
                            <input type="number" class="form-control" id="personalSales" value="1000">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Team Structure</label>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label for="level1Members" class="form-label small">Level 1 Members</label>
                                    <input type="number" class="form-control" id="level1Members" value="5">
                                </div>
                                <div class="col-md-6">
                                    <label for="level1Sales" class="form-label small">Level 1 Sales ($)</label>
                                    <input type="number" class="form-control" id="level1Sales" value="500">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label for="level2Members" class="form-label small">Level 2 Members</label>
                                    <input type="number" class="form-control" id="level2Members" value="15">
                                </div>
                                <div class="col-md-6">
                                    <label for="level2Sales" class="form-label small">Level 2 Sales ($)</label>
                                    <input type="number" class="form-control" id="level2Sales" value="300">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label for="level3Members" class="form-label small">Level 3 Members</label>
                                    <input type="number" class="form-control" id="level3Members" value="30">
                                </div>
                                <div class="col-md-6">
                                    <label for="level3Sales" class="form-label small">Level 3 Sales ($)</label>
                                    <input type="number" class="form-control" id="level3Sales" value="200">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="fastStartBonus" checked>
                                <label class="form-check-label" for="fastStartBonus">
                                    Include Fast Start Bonus
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="matchingBonus" checked>
                                <label class="form-check-label" for="matchingBonus">
                                    Include Matching Bonus
                                </label>
                            </div>
                        </div>
                        
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" id="calculateBtn">
                                <i class="fas fa-calculator me-1"></i> Calculate Earnings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-md-7 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Calculation Results</h5>
                        <div>
                            <button class="btn btn-sm btn-outline-secondary me-2" id="printResults">
                                <i class="fas fa-print me-1"></i> Print
                            </button>
                            <button class="btn btn-sm btn-outline-primary" id="exportPDF">
                                <i class="fas fa-file-pdf me-1"></i> Export PDF
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="calculationResults">
                        <div class="alert alert-info mb-4">
                            <i class="fas fa-info-circle me-2"></i> Enter your parameters and click "Calculate Earnings" to see your potential commissions.
                        </div>
                        
                        <div id="resultsContent" style="display: none;">
                            <div class="mb-4">
                                <h5>Summary</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Total Potential Earnings</h6>
                                                <h2 class="card-text text-primary" id="totalEarnings">$0</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card bg-light mb-3">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Effective Commission Rate</h6>
                                                <h2 class="card-text text-success" id="commissionRate">0%</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <h5>Earnings Breakdown</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Source</th>
                                                <th>Rate</th>
                                                <th>Volume</th>
                                                <th>Earnings</th>
                                            </tr>
                                        </thead>
                                        <tbody id="earningsBreakdown">
                                            <!-- Will be populated by JavaScript -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div>
                                <h5>Visual Breakdown</h5>
                                <canvas id="earningsChart" width="100%" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Commission Plan Details</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="planTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="unilevel-tab" data-bs-toggle="tab" data-bs-target="#unilevel" type="button" role="tab" aria-controls="unilevel" aria-selected="true">Unilevel Plan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="binary-tab" data-bs-toggle="tab" data-bs-target="#binary" type="button" role="tab" aria-controls="binary" aria-selected="false">Binary Plan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="matrix-tab" data-bs-toggle="tab" data-bs-target="#matrix" type="button" role="tab" aria-controls="matrix" aria-selected="false">Matrix Plan</button>
                        </li>
                    </ul>
                    <div class="tab-content p-3" id="planTabsContent">
                        <div class="tab-pane fade show active" id="unilevel" role="tabpanel" aria-labelledby="unilevel-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Unilevel Commission Structure</h6>
                                    <p>In the Unilevel plan, you earn commissions from the sales of your personally sponsored members (Level 1) and their downlines up to a certain number of levels deep.</p>
                                    <ul>
                                        <li>Level 1 (Direct Referrals): 20% commission</li>
                                        <li>Level 2: 10% commission</li>
                                        <li>Level 3: 5% commission</li>
                                        <li>Level 4: 3% commission</li>
                                        <li>Level 5: 2% commission</li>
                                    </ul>
                                    <p>Additional bonuses:</p>
                                    <ul>
                                        <li>Fast Start Bonus: 10% on first purchase of new members</li>
                                        <li>Matching Bonus: 20% of the commissions earned by your personally sponsored members</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <img src="https://via.placeholder.com/500x300?text=Unilevel+Plan+Diagram" class="img-fluid rounded" alt="Unilevel Plan Diagram">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="binary" role="tabpanel" aria-labelledby="binary-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Binary Commission Structure</h6>
                                    <p>In the Binary plan, you build two legs (left and right) and earn commissions based on the weaker leg's volume.</p>
                                    <ul>
                                        <li>Base Commission: 10% of the weaker leg's volume</li>
                                        <li>Weekly Cap: $10,000</li>
                                        <li>Carryover: Unused volume carries over to the next period</li>
                                    </ul>
                                    <p>Additional bonuses:</p>
                                    <ul>
                                        <li>Matching Bonus: 10% of the binary commissions earned by your personally sponsored members</li>
                                        <li>Leadership Bonus: 2-5% based on rank achievements</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <img src="https://via.placeholder.com/500x300?text=Binary+Plan+Diagram" class="img-fluid rounded" alt="Binary Plan Diagram">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="matrix" role="tabpanel" aria-labelledby="matrix-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6>Matrix Commission Structure (3x3)</h6>
                                    <p>In the 3x3 Matrix plan, each person can have a maximum of 3 members on their first level, creating a structured organization 3 levels deep.</p>
                                    <ul>
                                        <li>Level 1 (3 positions): 15% commission</li>
                                        <li>Level 2 (9 positions): 10% commission</li>
                                        <li>Level 3 (27 positions): 5% commission</li>
                                    </ul>
                                    <p>Additional bonuses:</p>
                                    <ul>
                                        <li>Matrix Completion Bonus: $500 when all 39 positions are filled</li>
                                        <li>Fast Start Bonus: 10% on first purchase of new members</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <img src="https://via.placeholder.com/500x300?text=Matrix+Plan+Diagram" class="img-fluid rounded" alt="Matrix Plan Diagram">
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

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle calculate button click
        document.getElementById('calculateBtn').addEventListener('click', function() {
            calculateCommissions();
        });
        
        function calculateCommissions() {
            // Get input values
            const plan = document.getElementById('commissionPlan').value;
            const personalSales = parseFloat(document.getElementById('personalSales').value) || 0;
            const level1Members = parseInt(document.getElementById('level1Members').value) || 0;
            const level1Sales = parseFloat(document.getElementById('level1Sales').value) || 0;
            const level2Members = parseInt(document.getElementById('level2Members').value) || 0;
            const level2Sales = parseFloat(document.getElementById('level2Sales').value) || 0;
            const level3Members = parseInt(document.getElementById('level3Members').value) || 0;
            const level3Sales = parseFloat(document.getElementById('level3Sales').value) || 0;
            const includeFastStart = document.getElementById('fastStartBonus').checked;
            const includeMatching = document.getElementById('matchingBonus').checked;
            
            // Calculate total sales volume
            const level1Volume = level1Members * level1Sales;
            const level2Volume = level2Members * level2Sales;
            const level3Volume = level3Members * level3Sales;
            const totalVolume = personalSales + level1Volume + level2Volume + level3Volume;
            
            // Initialize earnings variables
            let personalEarnings = 0;
            let level1Earnings = 0;
            let level2Earnings = 0;
            let level3Earnings = 0;
            let fastStartEarnings = 0;
            let matchingEarnings = 0;
            
            // Calculate based on selected plan
            if (plan === 'unilevel') {
                personalEarnings = personalSales * 0.25; // 25% on personal sales
                level1Earnings = level1Volume * 0.20; // 20% on level 1
                level2Earnings = level2Volume * 0.10; // 10% on level 2
                level3Earnings = level3Volume * 0.05; // 5% on level 3
                
                if (includeFastStart) {
                    // Assume 20% of members are new and qualify for fast start
                    const newMembers = Math.ceil(level1Members * 0.2);
                    fastStartEarnings = newMembers * level1Sales * 0.10; // 10% fast start bonus
                }
                
                if (includeMatching) {
                    // 20% matching bonus on level 1 members' earnings
                    const level1MemberEarnings = (level2Volume / level1Members) * 0.20; // avg earnings per level 1 member
                    matchingEarnings = level1MemberEarnings * level1Members * 0.20; // 20% matching
                }
            } else if (plan === 'binary') {
                // Simplified binary calculation (normally more complex)
                const leftLegVolume = (level1Volume + level2Volume) * 0.5; // assume 50% in left leg
                const rightLegVolume = (level1Volume + level2Volume) * 0.5; // assume 50% in right leg
                const weakerLeg = Math.min(leftLegVolume, rightLegVolume);
                
                personalEarnings = personalSales * 0.25; // 25% on personal sales
                level1Earnings = weakerLeg * 0.10; // 10% on weaker leg
                level2Earnings = 0; // Binary doesn't use level-based commissions
                level3Earnings = 0;
                
                if (includeMatching) {
                    // 10% matching bonus on binary commissions
                    matchingEarnings = level1Earnings * 0.10;
                }
            } else if (plan === 'matrix') {
                // 3x3 Matrix calculation
                personalEarnings = personalSales * 0.25; // 25% on personal sales
                
                // Cap the number of members at matrix limits
                const matrix1Members = Math.min(level1Members, 3);
                const matrix2Members = Math.min(level2Members, 9);
                const matrix3Members = Math.min(level3Members, 27);
                
                level1Earnings = (matrix1Members * level1Sales) * 0.15; // 15% on level 1
                level2Earnings = (matrix2Members * level2Sales) * 0.10; // 10% on level 2
                level3Earnings = (matrix3Members * level3Sales) * 0.05; // 5% on level 3
                
                if (includeFastStart) {
                    // Assume 20% of members are new and qualify for fast start
                    const newMembers = Math.ceil(matrix1Members * 0.2);
                    fastStartEarnings = newMembers * level1Sales * 0.10; // 10% fast start bonus
                }
                
                // Matrix completion bonus if all positions filled
                if (matrix1Members === 3 && matrix2Members === 9 && matrix3Members === 27) {
                    matchingEarnings = 500; // $500 completion bonus
                }
            }
            
            // Calculate total earnings
            const totalEarnings = personalEarnings + level1Earnings + level2Earnings + 
                                level3Earnings + fastStartEarnings + matchingEarnings;
            
            // Calculate effective commission rate
            const commissionRate = (totalEarnings / totalVolume) * 100;
            
            // Update the results
            document.getElementById('totalEarnings').textContent = '$' + totalEarnings.toFixed(2);
            document.getElementById('commissionRate').textContent = commissionRate.toFixed(1) + '%';
            
            // Update earnings breakdown table
            const breakdownTable = document.getElementById('earningsBreakdown');
            breakdownTable.innerHTML = '';
            
            // Add rows for each earning type
            if (personalEarnings > 0) {
                addEarningRow(breakdownTable, 'Personal Sales', '25%', '$' + personalSales.toFixed(2), '$' + personalEarnings.toFixed(2));
            }
            
            if (level1Earnings > 0) {
                const rate = plan === 'unilevel' ? '20%' : (plan === 'binary' ? '10%' : '15%');
                addEarningRow(breakdownTable, 'Level 1 Commissions', rate, '$' + level1Volume.toFixed(2), '$' + level1Earnings.toFixed(2));
            }
            
            if (level2Earnings > 0) {
                addEarningRow(breakdownTable, 'Level 2 Commissions', '10%', '$' + level2Volume.toFixed(2), '$' + level2Earnings.toFixed(2));
            }
            
            if (level3Earnings > 0) {
                addEarningRow(breakdownTable, 'Level 3 Commissions', '5%', '$' + level3Volume.toFixed(2), '$' + level3Earnings.toFixed(2));
            }
            
            if (fastStartEarnings > 0) {
                addEarningRow(breakdownTable, 'Fast Start Bonus', '10%', 'New Members', '$' + fastStartEarnings.toFixed(2));
            }
            
            if (matchingEarnings > 0) {
                const label = plan === 'matrix' ? 'Matrix Completion Bonus' : 'Matching Bonus';
                const rate = plan === 'binary' ? '10%' : (plan === 'unilevel' ? '20%' : 'Flat');
                addEarningRow(breakdownTable, label, rate, '-', '$' + matchingEarnings.toFixed(2));
            }
            
            // Show results content
            document.getElementById('resultsContent').style.display = 'block';
            
            // Create chart
            createEarningsChart(personalEarnings, level1Earnings, level2Earnings, level3Earnings, fastStartEarnings, matchingEarnings);
        }
        
        function addEarningRow(table, source, rate, volume, earnings) {
            const row = table.insertRow();
            row.insertCell(0).textContent = source;
            row.insertCell(1).textContent = rate;
            row.insertCell(2).textContent = volume;
            row.insertCell(3).textContent = earnings;
        }
        
        function createEarningsChart(personal, level1, level2, level3, fastStart, matching) {
            const ctx = document.getElementById('earningsChart').getContext('2d');
            
            // Destroy existing chart if it exists
            if (window.earningsChart) {
                window.earningsChart.destroy();
            }
            
            window.earningsChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Personal Sales', 'Level 1', 'Level 2', 'Level 3', 'Fast Start', 'Matching/Bonus'],
                    datasets: [{
                        data: [personal, level1, level2, level3, fastStart, matching],
                        backgroundColor: [
                            'rgba(0, 123, 255, 0.7)',
                            'rgba(40, 167, 69, 0.7)',
                            'rgba(255, 193, 7, 0.7)',
                            'rgba(23, 162, 184, 0.7)',
                            'rgba(111, 66, 193, 0.7)',
                            'rgba(220, 53, 69, 0.7)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                boxWidth: 12
                            }
                        }
                    }
                }
            });
        }
        
        // Handle print button
        document.getElementById('printResults').addEventListener('click', function() {
            window.print();
        });
        
        // Handle export PDF button (in a real app, this would use a PDF library)
        document.getElementById('exportPDF').addEventListener('click', function() {
            alert('In a production environment, this would generate a PDF using a library like jsPDF or by calling a server-side PDF generation endpoint.');
        });
    });
</script>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calculateForm = document.getElementById('calculate-form');
        const resultsDiv = document.getElementById('calculation-results');
        
        if (calculateForm) {
            calculateForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(calculateForm);
                const amount = formData.get('amount');
                const type = formData.get('type');
                
                // Send AJAX request
                fetch('{{ route("member.commissions.calculate") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        amount: amount,
                        type: type
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        resultsDiv.innerHTML = `<div class="alert alert-danger">${data.error}</div>`;
                    } else {
                        let html = '<div class="table-responsive mt-4">';
                        html += '<table class="table table-striped">';
                        html += '<thead><tr><th>Level</th><th>Percentage</th><th>Amount</th></tr></thead>';
                        html += '<tbody>';
                        
                        let total = 0;
                        data.commissions.forEach(commission => {
                            html += `<tr>
                                <td>${commission.level || 'N/A'}</td>
                                <td>${commission.percentage || 'N/A'}%</td>
                                <td>$${commission.amount.toFixed(2)}</td>
                            </tr>`;
                            total += commission.amount;
                        });
                        
                        html += `<tr class="table-primary">
                            <td colspan="2"><strong>Total</strong></td>
                            <td><strong>$${total.toFixed(2)}</strong></td>
                        </tr>`;
                        html += '</tbody></table></div>';
                        
                        resultsDiv.innerHTML = html;
                    }
                })
                .catch(error => {
                    resultsDiv.innerHTML = `<div class="alert alert-danger">An error occurred: ${error.message}</div>`;
                });
            });
        }
    });
</script>

