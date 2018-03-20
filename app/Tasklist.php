<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model
{
    // ホワイトリスト
    protected $fillable = ['content', 'status', 10];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
