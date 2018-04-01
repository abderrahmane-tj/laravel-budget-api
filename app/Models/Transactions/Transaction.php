<?php

namespace App\Models\Transactions;

use App\Models\Model;
use Carbon\Carbon;

/**
 * Transaction model
 * @package App\Models\Transactions
 * @property Carbon $done_at
 * @property integer $payee_id
 * @property string $memo
 * @property float $amount
 * @property boolean $checked
 * @property integer $category_id
 * @property integer $account_id
 * @property Account $account
 * @property Payee $payee
 * @property Category $category
 */
class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'done_at', 'payee_id', 'note', 'amount', 'checked', 'category_id',
        'account_id'
    ];
    protected $dates = [
        'done_at'
    ];
    protected $casts = [
        'checked' => 'boolean'
    ];

    /**
     * The account on which the transaction was made
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * The payee of the transaction
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payee()
    {
        return $this->belongsTo(Payee::class);
    }

    /**
     * The category on which the transaction was made
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
