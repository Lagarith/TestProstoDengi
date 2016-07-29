<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;

class TransferController extends Controller
{
    public function get_transfer()
    {
        $id = Auth::id();
        $balance = \App\User::select('balance')->where('id', '=', $id)->get();
        //dd($balance);
        return view('transfer', ['balance'=>$balance]);
    }
    
    public function post_transfer(Request $request)
    {
        $parametrs = null;
        $recipient = $request->input('recipient');
        $summa = $request->input('summa');
        $user1 = \App\User::find($request->user_id);        

        //$balance1 = ($user1->balance) - $summa;
        if ((($user1->balance) - $summa) < 0){
            $parametrs = ['balance' => 'Недостаточно средств'];
            return back()->withErrors($parametrs);            
        }
            else{
                $balance1 = $user1->balance - $summa;                
            }

        $user2 = \App\User::where('name', 'LIKE', $recipient)->first();
        if ($user2 == null){
            $parametrs = ['recipient' => 'Такого пользователя не существует'];
            return back()->withErrors($parametrs);            
        }
            else{
                $balance2 = $user2->balance + $summa;                
            }

            $user1->balance = $balance1;
            $user2->balance = $balance2;
            $user1->save();
            $user2->save();
            return back()->with('message','vse okay');


    }
    
}
