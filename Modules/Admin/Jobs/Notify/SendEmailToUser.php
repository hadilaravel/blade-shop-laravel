<?php

namespace Modules\Admin\Jobs\Notify;

use App\Http\Services\Message\Email\EmailService;
use App\Http\Services\Message\MessageService;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Admin\Entities\Notify\Email;

class SendEmailToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $email;

    public function __construct(Email $email)
    {
        $this->email = $email;
    }


    public function handle()
    {
        $users = User::query()->whereNotNull('email')->where('activation' , 1)->get();
        foreach ($users as $user) {
            $emailService = new EmailService();
            $details = [
                'title' => $this->email->title,
                'body' => $this->email->body,
            ];
            $emailService->setDetails($details);
            $emailService->setFrom('noreply@example.com', 'amazon');
            $emailService->setSubject($this->email->title);
            $emailService->setTo($user->email);

            $messageService = new MessageService($emailService);
            $messageService->send();
        }
    }
}
