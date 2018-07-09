<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscriptikon;
use App\Mail\SubscribeEmail;


class SubsController extends Controller
{


    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email'	=>	'required|email|unique:subscriptikons'
        ]);

        $subs = Subscriptikon::add($request->get('email'));


        \Mail::to($subs)->send(new SubscribeEmail($subs));

        return redirect()->back()
            ->with('notification_newsletter','Thanks for subscribing!');
    }
}
