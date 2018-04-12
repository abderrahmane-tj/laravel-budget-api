<?php

namespace App\Models;


/**
 * Transaction payee
 * @package App\Models
 * @property string name
 */
class Payee extends Model
{
    protected $table = 'payees';

    protected $fillable = [
      'name'
    ];

    /**
     * transactions done with the payee
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
