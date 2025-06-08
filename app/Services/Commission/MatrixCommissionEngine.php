<?php

namespace App\Services\Commission;

class MatrixCommissionEngine implements CommissionEngine
{
    protected $settings = [
        'width' => 3,
        'depth' => 7,
        'force_spill' => true,
        'allow_empty' => false,
        'levels' => [
            ['level' => 1, 'percentage' => 10, 'qualification' => 'none'],
            ['level' => 2, 'percentage' => 8, 'qualification' => 'active'],
            ['level' => 3, 'percentage' => 6, 'qualification' => 'active'],
            ['level' => 4, 'percentage' => 4, 'qualification' => 'rank'],
            ['level' => 5, 'percentage' => 3, 'qualification' => 'rank'],
            ['level' => 6, 'percentage' => 2, 'qualification' => 'rank'],
            ['level' => 7, 'percentage' => 1, 'qualification' => 'rank'],
        ]
    ];
    
    /**
     * Calculate commissions for a given transaction
     *
     * @param array $transaction Transaction data
     * @return array Calculated commissions
     */
    public function calculateCommissions(array $transaction): array
    {
        $commissions = [];
        $amount = $transaction['amount'];
        $user_id = $transaction['user_id'];
        
        // Get matrix upline
        $matrix_upline = $this->getMatrixUpline($user_id);
        
        // Calculate commissions for each level
        foreach ($this->settings['levels'] as $level_data) {
            $level = $level_data['level'];
            
            if (isset($matrix_upline[$level - 1])) {
                $upline_user = $matrix_upline[$level - 1];
                
                // Check qualification
                if ($this->isQualified($upline_user, $level_data['qualification'])) {
                    $commission_amount = $amount * ($level_data['percentage'] / 100);
                    
                    $commissions[] = [
                        'user_id' => $upline_user['id'],
                        'amount' => $commission_amount,
                        'level' => $level,
                        'percentage' => $level_data['percentage'],
                        'source_id' => $user_id,
                        'transaction_id' => $transaction['id']
                    ];
                }
            }
        }
        
        return $commissions;
    }
    
    /**
     * Get matrix upline for a user
     *
     * @param int $user_id
     * @return array
     */
    protected function getMatrixUpline(int $user_id): array
    {
        // This would typically query the database to get the matrix upline
        // For demonstration purposes, we'll return mock data
        return [
            ['id' => 10, 'name' => 'Matrix Upline 1', 'status' => 'active', 'rank' => 'gold'],
            ['id' => 5, 'name' => 'Matrix Upline 2', 'status' => 'active', 'rank' => 'silver'],
            ['id' => 3, 'name' => 'Matrix Upline 3', 'status' => 'active', 'rank' => 'bronze'],
            ['id' => 2, 'name' => 'Matrix Upline 4', 'status' => 'inactive', 'rank' => 'bronze'],
            ['id' => 1, 'name' => 'Matrix Upline 5', 'status' => 'active', 'rank' => 'platinum'],
            ['id' => 8, 'name' => 'Matrix Upline 6', 'status' => 'active', 'rank' => 'diamond'],
            ['id' => 4, 'name' => 'Matrix Upline 7', 'status' => 'active', 'rank' => 'diamond'],
        ];
    }
    
    /**
     * Check if a user is qualified for a commission level
     *
     * @param array $user
     * @param string $qualification
     * @return bool
     */
    protected function isQualified(array $user, string $qualification): bool
    {
        switch ($qualification) {
            case 'none':
                return true;
            case 'active':
                return $user['status'] === 'active';
            case 'rank':
                return $user['status'] === 'active' && in_array($user['rank'], ['gold', 'platinum', 'diamond']);
            default:
                return false;
        }
    }
    
    /**
     * Get commission plan settings
     *
     * @return array
     */
    public function getSettings(): array
    {
        return $this->settings;
    }
    
    /**
     * Set commission plan settings
     *
     * @param array $settings
     * @return void
     */
    public function setSettings(array $settings): void
    {
        $this->settings = array_merge($this->settings, $settings);
    }
}
