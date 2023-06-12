<?php

namespace Src\Modules\Auth\Infrastructure\Jobs;

use Illuminate\Bus\Queueable;
use Src\Common\Emails\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Src\Common\Emails\Mailables\SendMailVerification;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\User;

class RegisteredUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private readonly User $user) { }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = new SendMailVerification($this->user);
        Mailer::to($this->user->email)->send($mail);
    }
}
