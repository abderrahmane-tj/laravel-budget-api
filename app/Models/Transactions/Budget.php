<?php

namespace App\Models\Transactions;

use App\Models\Model;

/**
 * Monthly budget model
 * @package App\Models\Transactions
 * @property string name
 * @property string note
 * @property float amount
 * @property integer month
 * @property integer category_id
 * @property Category category
 */
class Budget extends Model
{
    protected $table = 'budgets';

    protected $fillable = [
      'note', 'amount', 'month', 'category_id'
    ];

    /**
     * the category the budget belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
