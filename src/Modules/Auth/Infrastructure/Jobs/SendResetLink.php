<?php

namespace Src\Modules\Auth\Infrastructure\Jobs;

use Illuminate\Bus\Queueable;
use Src\Common\Emails\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Src\Common\Emails\Mailables\SendMailResetPassword;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class SendResetLink implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private readonly User $user) { }

    public function handle()
    {
        $mail = new SendMailResetPassword($this->user);
        Mailer::to($this->user->email)->send($mail);
    }
}
