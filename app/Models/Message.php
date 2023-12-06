<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $with = ['user'];


    protected $guarded = ['id'];

     public function scopeFilter($query, array $filters){
        $query->when($filters['user'] ?? false, fn($query, $user) => 
                $query->whereHas('user', fn($query) =>
                    $query->where('email', $user)
                )
        );

    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
