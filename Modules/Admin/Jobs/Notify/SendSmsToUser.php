<?php

namespace Modules\Admin\Jobs\Notify;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Config;
use Melipayamak\MelipayamakApi;
use Modules\Admin\Entities\Notify\Email;
use Modules\Admin\Entities\Notify\Sms;

class SendSmsToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $sms;


    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }


    public function handle()
    {
        $users = User::query()->whereNotNull('mobile')->where('activation' , 1)->get();
        foreach ($users as $user) {
            try {
                $username = Config::get('sms.username');
                $password = Config::get('sms.password');
                $api = new MelipayamakApi($username, $password);
                $sms = $api->sms();
                $to = '0' . $user->mobile;
                $from = Config::get('sms.otp_from');
                $text = $this->sms->body;
                $response = $sms->send($to, $from, $text);
                $json = json_decode($response);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}
