<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender',
        'chat_id',
        'message',
    ];
    

    public function chat(){
        return $this->belongsTo(Chat::class , 'chat_id' , 'id');
    }
    public function sender(){
        return $this->belongsTo(Chat::class , 'sender' , 'id');
    }
    
}
