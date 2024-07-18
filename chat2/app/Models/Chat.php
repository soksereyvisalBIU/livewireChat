<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender',
        'reciever',
    ];
    
    public function messages(){
        return $this->hasMany(Message::class , 'chat_id' , 'id')->latest()->limit(4);
    }

    public function sender(){
        return $this->belongsTo(User::class , 'sender' , 'id');
    }
    public function reciever(){
        return $this->belongsTo(User::class , 'sender' , 'id');
    }
    
}
