<?php

namespace App\Models\Transactions;

use App\Models\Model;
use Illuminate\Support\Collection;

/**
 * Category Model
 * @package App\Models\Transactions
 * @property string $name
 * @property string $note
 * @property integer $position
 * @property integer $parent_id
 * @property Transaction[]|Collection $transactions
 * @property Budget[]|Collection $budgets
 * @property Category $category
 */
class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
      'name', 'note', 'position', 'category_id'
    ];

    /**
     * transactions made on this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * budgets on this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    /**
     * parent category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(){
        return $this->belongsTo(Category::class);
    }
}
