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

        // https://laravel.com/docs/5.5/mail#sending-mail
        // in laravel find this code:
        // Mail::to($request->user())->send(new OrderShipped($order));


        #==== este codigo de /Mail tbn pertenece a este commit
        \Mail::to($subs)->send(new SubscribeEmail($subs));


        return redirect()->back()
            ->with('notification_newsletter','Thanks for subscribing!');
    }


    public function verify($token)
    {
        dd($token);
    }
}
