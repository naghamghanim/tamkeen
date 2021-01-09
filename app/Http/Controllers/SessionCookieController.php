<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionCookieController extends Controller
{
    function sessionLogin()
    {
        return view("session-cookie.session-login");
    }

    function sessionSecurePage()
    {
        return view("session-cookie.session-secure");
    }

    function sessionSignout()
    {
        return view("about.vision");
    }
}
