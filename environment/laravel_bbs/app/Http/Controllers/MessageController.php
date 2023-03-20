<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    //
    
    public function index(){
        
        $messages = Message::all();
        
        return view('messages.index',[
            'title' => 'ひとこと掲示板',
            'messages' => $messages,
            ]);
        
    }
    
    public function store(MessageRequest $request){
        
        
        $message = Message::create(//インタラクティブシェルでやっていたような処理をこのメソッドで簡潔に行える
            $request->only([
                'name',
                'body'
                ])
            );
        
        
        return redirect('/messages');//リダイレクトは1つ前のURLに行くこと　つまりGETメソッドの/messagesに行くことを示す
        
    }
}
