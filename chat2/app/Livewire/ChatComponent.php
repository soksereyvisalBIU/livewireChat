<?php

namespace App\Livewire;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function Termwind\render;

class ChatComponent extends Component
{

    public $message;

    public $reciever_id = null;
    
    public function setReciever($reciever_id){
        $this->reciever_id = $reciever_id;
        $this->render();
    }
    
    public function sendMessage(){

        $chat =  Chat::where(function ($query) {
            $query->where('sender', Auth::user()->id)
                    ->where('reciever', $this->reciever_id);
        })->orWhere(function ($query) {
            $query->where('sender', $this->reciever_id)
                    ->where('reciever', Auth::user()->id);
        })->first() 

        ?? 

        Chat::firstOrCreate([
            'sender' => Auth::user()->id,
            'reciever' => $this->reciever_id,
        ]);
        
        Message::create([
            'sender' => Auth::user()->id,
            'chat_id' => $chat->id,
            'message' => $this->message,
        ]);


    }
    
    public function render()
    {

        $users = User::get();

        $chat =  Chat::where(function ($query) {
            $query->where('sender', Auth::user()->id)
                    ->where('reciever', $this->reciever_id);
        })->orWhere(function ($query) {
            $query->where('sender', $this->reciever_id)
                    ->where('reciever', Auth::user()->id);
        })->first() ?? [];

        // dd($chat);

        return view('livewire.chat-component' , compact('users' , 'chat'));
    }
}
