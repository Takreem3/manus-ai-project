<?php

namespace App\Services\Commission;

class UnilevelCommissionEngine implements CommissionEngine
{
    protected $settings = [
        'levels' => [
            ['level' => 1, 'percentage' => 20, 'qualification' => 'none'],
            ['level' => 2, 'percentage' => 10, 'qualification' => 'active'],
            ['level' => 3, 'percentage' => 5, 'qualification' => 'active'],
            ['level' => 4, 'percentage' => 3, 'qualification' => 'rank'],
            ['level' => 5, 'percentage' => 2, 'qualification' => 'rank'],
        ],
        'dynamic_compression' => true,
        'infinite_compression' => false,
        'max_payout' => 10000,
        'max_percentage' => 40
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
        
        // Get upline members
        $upline = $this->getUplineMembers($user_id);
        
        // Calculate commissions for each level
        foreach ($this->settings['levels'] as $index => $level) {
            if (isset($upline[$index])) {
                $sponsor = $upline[$index];
                
                // Check qualification
                if ($this->isQualified($sponsor, $level['qualification'])) {
                    $commission_amount = $amount * ($level['percentage'] / 100);
                    
                    $commissions[] = [
                        'user_id' => $sponsor['id'],
                        'amount' => $commission_amount,
                        'level' => $level['level'],
                        'percentage' => $level['percentage'],
                        'source_id' => $user_id,
                        'transaction_id' => $transaction['id']
                    ];
                } else if ($this->settings['dynamic_compression']) {
                    // Handle dynamic compression logic here
                    // This would look for the next qualified member
                }
            }
        }
        
        return $commissions;
    }
    
    /**
     * Get upline members for a user
     *
     * @param int $user_id
     * @return array
     */
    protected function getUplineMembers(int $user_id): array
    {
        // This would typically query the database to get the upline
        // For demonstration purposes, we'll return mock data
        return [
            ['id' => 2, 'name' => 'Sponsor 1', 'status' => 'active', 'rank' => 'gold'],
            ['id' => 3, 'name' => 'Sponsor 2', 'status' => 'active', 'rank' => 'silver'],
            ['id' => 4, 'name' => 'Sponsor 3', 'status' => 'active', 'rank' => 'bronze'],
            ['id' => 5, 'name' => 'Sponsor 4', 'status' => 'inactive', 'rank' => 'bronze'],
            ['id' => 6, 'name' => 'Sponsor 5', 'status' => 'active', 'rank' => 'platinum'],
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
