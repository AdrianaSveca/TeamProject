<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This model represents the discount_codes table.
 * It defines the attributes and methods for discount codes used at checkout (e.g. percent or fixed amount off, optional minimum order, validity dates, and usage limit).
 */
class DiscountCode extends Model
{
    protected $fillable = [
        'code',
        'type',
        'value',
        'min_order',
        'valid_from',
        'valid_until',
        'usage_limit',
        'times_used',
        'active',
    ];

    protected $casts = [
        'value'      => 'decimal:2',
        'min_order'  => 'decimal:2',
        'valid_from' => 'datetime',
        'valid_until'=> 'datetime',
        'usage_limit'=> 'integer',
        'times_used' => 'integer',
        'active'     => 'boolean',
    ];

    /**
     * Check if the code is valid for a given subtotal (active, within date range, under usage limit, and above minimum order if set).
     */
    public function isValidFor(float $subtotal): bool
    {
        if (!$this->active) {
            return false;
        }
        if ($this->valid_from && now()->lt($this->valid_from)) {
            return false;
        }
        if ($this->valid_until && now()->gt($this->valid_until)) {
            return false;
        }
        if ($this->usage_limit !== null && $this->times_used >= $this->usage_limit) {
            return false;
        }
        if ($this->min_order !== null && $subtotal < (float) $this->min_order) {
            return false;
        }
        return true;
    }

    /**
     * Calculate the discount amount for a given subtotal (percent of subtotal or fixed amount, whichever applies).
     */
    public function discountAmount(float $subtotal): float
    {
        if ($this->type === 'percent') {
            return round($subtotal * ((float) $this->value) / 100, 2);
        }
        return min((float) $this->value, $subtotal);
    }
}
