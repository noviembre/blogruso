<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriptikon extends Model
{

    public static function add($email)
    {
        $sub = new static;
        $sub->email = $email;
        $sub->token = str_random(100);
        $sub->save();

        return $sub;
    }

    public function remove()
    {
        $this->delete();
    }

    public function generateToken()
    {
        $this->token = str_random(100);
        $this->save();
    }
}
