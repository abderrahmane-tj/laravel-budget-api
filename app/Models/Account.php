<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

/**
 * Account Model
 * @package App\Models
 * @property string name
 * @property integer type
 * @property boolean off_budget
 * @property float balance
 * @property Transaction[]|Collection transactions
 */
class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
      'name', 'type', 'off_budget', 'balance'
    ];

    protected $casts = [
        'off_budget' => 'boolean',
        'balance' => 'float',
        'type' => 'integer',
    ];

    /**
     * transactions done on an account
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
