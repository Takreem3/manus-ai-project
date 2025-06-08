<?php

namespace App\Services\Commission;

class BinaryCommissionEngine implements CommissionEngine
{
    protected $settings = [
        'percentage' => 10,
        'cap_type' => 'percentage',
        'cap_value' => 50,
        'cycle_amount' => 300,
        'max_cycles' => 10,
        'carry_forward' => true,
        'carry_forward_expiry' => 'never',
        'carry_forward_limit' => 10000,
        'flush_volume' => false
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
        $user_id = $transaction['user_id'];
        
        // Get binary tree volumes
        $volumes = $this->getBinaryVolumes($user_id);
        $left_volume = $volumes['left'];
        $right_volume = $volumes['right'];
        
        // Determine weaker and stronger leg
        $weaker_leg = $left_volume <= $right_volume ? 'left' : 'right';
        $stronger_leg = $weaker_leg === 'left' ? 'right' : 'left';
        $weaker_volume = $weaker_leg === 'left' ? $left_volume : $right_volume;
        $stronger_volume = $stronger_leg === 'left' ? $left_volume : $right_volume;
        
        // Calculate cycles
        $cycles = floor($weaker_volume / $this->settings['cycle_amount']);
        $cycles = min($cycles, $this->settings['max_cycles']);
        
        // Calculate commission amount
        $commission_amount = $cycles * $this->settings['cycle_amount'] * ($this->settings['percentage'] / 100);
        
        // Apply cap if needed
        if ($this->settings['cap_type'] === 'percentage') {
            $max_commission = $stronger_volume * ($this->settings['cap_value'] / 100);
            $commission_amount = min($commission_amount, $max_commission);
        } elseif ($this->settings['cap_type'] === 'fixed') {
            $commission_amount = min($commission_amount, $this->settings['cap_value']);
        }
        
        // Calculate carry forward volume
        $used_volume = $cycles * $this->settings['cycle_amount'];
        $left_carry_forward = $left_volume - ($weaker_leg === 'left' ? $used_volume : 0);
        $right_carry_forward = $right_volume - ($weaker_leg === 'right' ? $used_volume : 0);
        
        // Add commission record
        if ($commission_amount > 0) {
            $commissions[] = [
                'user_id' => $user_id,
                'amount' => $commission_amount,
                'cycles' => $cycles,
                'left_volume' => $left_volume,
                'right_volume' => $right_volume,
                'left_carry_forward' => $left_carry_forward,
                'right_carry_forward' => $right_carry_forward,
                'transaction_id' => $transaction['id']
            ];
        }
        
        return $commissions;
    }
    
    /**
     * Get binary volumes for a user
     *
     * @param int $user_id
     * @return array
     */
    protected function getBinaryVolumes(int $user_id): array
    {
        // This would typically query the database to get the binary volumes
        // For demonstration purposes, we'll return mock data
        return [
            'left' => 1200,
            'right' => 900
        ];
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
