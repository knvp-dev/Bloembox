<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Respositories\AccountRepository;

class SendRegisterConfirmationEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $account;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $account)
    {
        $this->account = $account;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Mail::send('email.verify', [
                'email' => $this->account->email, 
                'confirmation_code' => $this->account->confirmation_code
            ], function($message){
                $message->from('noreply@bloembox.be')
                        ->to($this->account->email, $this->account->firstname + " " + $this->account->lastname)
                        ->subject('Verifieer uw email adres');
            });
    }
}
