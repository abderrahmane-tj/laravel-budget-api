<?php

namespace App\Models;

use Carbon\Carbon;
use \Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * Base model for all app models
 * @package App\Models
 * @mixin \Eloquent
 */
class Model extends BaseModel
{
    /**
     * Insert each item as a row. Does not generate events.
     *
     * @param  array $items
     * @return bool
     * @throws \Exception
     */
    public function insertAll(array $items)
    {
        if(empty($this->table)) {
            throw new \Exception('Can\'t use this method without having $table attribute on your model');
        }
        $now = Carbon::now();
        $items = collect($items)->map(function (array $data) use ($now) {
            return $this->timestamps ? array_merge([
                'created_at' => $now,
                'updated_at' => $now,
            ], $data) : $data;
        })->all();

        return \DB::table($this->table)->insert($items);
    }
}