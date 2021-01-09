<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendToViewController extends Controller
{
    //
    private $colors=['red','yellow','green'];
    private $userCount=2000;

    function index()
    
    {
        return view("send-to-view.index");
    }

    function usingWith()
    {
     $colors=['red','yellow','green'];
     $userCount=2000;
        return view("send-to-view.with")
            ->with("colors",$colors)
            ->with("usersCount",$userCount);
    }

    function usingWithName()
    { 
        $colors=['6red','yellow','green'];
        $userCount=2000;
        return view("send-to-view.with-name")
        ->withColors($colors)
        ->withUserCount($userCount);
    }


    function usingCompact() 
    {
        $colors=['red','yellow','green'];
        $userCount=2000;
       
        return view("send-to-view.with-compact",compact('colors','userCount'));
    }

}