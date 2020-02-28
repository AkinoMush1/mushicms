<?php

namespace App\Http\Controllers;

use App\Notifications\EmailNotify;
use App\User;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send_mail_token() {
        $user = auth('web')->user();
        $user->notify(new EmailNotify($user));
        return back();
    }

    public function check_mail_token($token) {
        $user = User::where('mail_token', $token)->first();
        if ($user) {
            $user->mail_status = true;
            $user->update();
            session()->flash('success', '邮箱验证成功');
            return redirect('/');
        };

        session()->flash('success', '邮箱验证失败');
        return redirect('/');
    }
}
