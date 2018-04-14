<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Account Model
 * @package App\Models
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property boolean $off_budget
 * @property float $balance
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Transaction[]|Collection $transactions
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

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * When an account is created, also create a transaction which amount is
         * equal to the account's balance
         */
        static::created(function (Account $account) {
            $account
                ->transactions()
                ->save(Transaction::make([
                    'done_at' => $account->created_at,
                    'note' => 'initial balance',
                    'amount' => $account->balance,
                    'checked' => true,
                    'account_id' => $account->id
                ]));
        });
    }
}
