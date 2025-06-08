<?php

namespace App\Services\Commission;

interface CommissionEngine
{
    /**
     * Calculate commissions for a given transaction
     *
     * @param array $transaction Transaction data
     * @return array Calculated commissions
     */
    public function calculateCommissions(array $transaction): array;
    
    /**
     * Get commission plan settings
     *
     * @return array
     */
    public function getSettings(): array;
    
    /**
     * Set commission plan settings
     *
     * @param array $settings
     * @return void
     */
    public function setSettings(array $settings): void;
}
