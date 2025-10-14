<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = [
        'name',
        'part_number',
        'description',
        'price',
        'stock_quantity',
        'min_stock_level',
        'category',
        'brand',
        'model',
        'compatible_appliances',
        'image',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock_quantity' => 'integer',
        'min_stock_level' => 'integer',
        'compatible_appliances' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    public function scopeLowStock($query)
    {
        return $query->whereColumn('stock_quantity', '<=', 'min_stock_level');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('name');
    }

    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->price, 2);
    }

    public function getStockStatusAttribute(): string
    {
        if ($this->stock_quantity <= 0) {
            return 'out_of_stock';
        } elseif ($this->stock_quantity <= $this->min_stock_level) {
            return 'low_stock';
        }
        return 'in_stock';
    }
}
