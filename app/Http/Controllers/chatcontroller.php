<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\product;
use App\category;
use App\subcategory;
use App\customer;
use App\feedback;
use App\chat;
use DataTime;

class chatcontroller extends Controller
{
    //
    function chat_details()
    {
        $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();
        foreach($cusname as $c)
        {
            //$from=chat::join('customers','customers.c_id','chats.from_user')->where('chats.from_user','!=',$c->c_id)->get()->distinct('customers.c_name');
            $from=DB::select('select DISTINCT(from_user),customers.* from chats join customers on customers.c_id=chats.from_user where chats.from_user <> ?',[$c->c_id]);
            $to=DB::select('select DISTINCT(from_user),customers.* from chats join customers on customers.c_id=chats.to_user where chats.to_user <> ?',[$c->c_id]);

            $fromchat=chat::join('customers','customers.c_id','chats.from_user')->where('chats.from_user','!=',$c->c_id)->get();
            $tochat=chat::join('customers','customers.c_id','chats.to_user')->where('chats.to_user','!=',$c->c_id)->get();
        }
        
        
        return view('customer/customer_chat',['cusname'=>$cusname,'to'=>$to,'from'=>$from,'fromchat'=>$fromchat,'tochat'=>$tochat]);   
    }

    function chat_ajax($cid)
    {
        $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();
        foreach($cusname as $c)
        {
            $fromchat=chat::join('customers','customers.c_id','chats.from_user')->where('chats.from_user','!=',$c->c_id)->where('chats.from_user',$cid)->get();
            $tochat=chat::join('customers','customers.c_id','chats.to_user')->where('chats.to_user','!=',$c->c_id)->where('chats.to_user',$cid)->get();
        }

      // $msg = "This is a simple message.";
       //return response()->json(array('msg'=> $msg), 200);

        $msg="<div class='msg_history'>";
            foreach ($fromchat as $f)
            {  $msg .="<div class='incoming_msg'>
                <div class='incoming_msg_img'> <img src='customer_img/{$f->c_img}'> </div>
                  <div class='received_msg'>
                      <div class='received_withd_msg'> <p>{$f->message}</p><span class='time_date'> {$f->timestamp}</span></div>
                  </div>
              </div>";
            }
            foreach ($tochat as $t)
            {
                $msg .= "<div class='outgoing_msg'>
                <div class='sent_msg'>
                <p>{$t->message}</p>
                <span class='time_date'> {$t->timestamp}</span> 
                </div>
                </div>";
            }
            $msg .="<div class='type_msg'>
            <div class='input_msg_write'>
            <form method='get' action='insert_chat/$cid'>
            <input type='hidden' name='_Token' value='{csrf_token()}'>
              <input type='text' name='msg' class='write_msg' placeholder='Type a message' />
              <button class='msg_send_btn' value='' type='submit'><i class='fa fa-paper-plane-o' aria-hidden='true'></i></button>
            </div></form>
          </div> ";
            
       return response()->json(array('msg'=> $msg), 200);
    }
    function insert_chat_detail(Request $r,$tocid)
    {
        $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();
        
        
        foreach($cusname as $c)
        {
            $qry=chat::insert([
                'message'=>$r->msg,
                'from_user'=>$c->c_id,
                'to_user'=>$tocid,
                'status'=>0
            ]);
        }
        return redirect()->back();
    }
}
