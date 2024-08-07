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
use Modules\Admin\Entities\Setting\SmsSetting;

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
        $smsSetting = SmsSetting::query()->first();
        if(!empty($smsSetting)) {
            $users = User::query()->whereNotNull('mobile')->where('activation', 1)->get();
            foreach ($users as $user) {
                try {
                    $username = $smsSetting->username;
                    $password = $smsSetting->password;
                    $api = new MelipayamakApi($username, $password);
                    $sms = $api->sms();
                    $to = '0' . $user->mobile;
                    $from = $smsSetting->from;
                    $text = $this->sms->body;
                    $response = $sms->send($to, $from, $text);
                    $json = json_decode($response);
                } catch (\Exception $e) {
                    alert()->error('لطفا تنظیمات مربوط به ارسال پیامک را انجام دهید');
                    return to_route('admin.notify.sms.index');
                }
            }
        }else{
            alert()->success('لطفا تنظیمات مربوط به ارسال پیامک را انجام دهید');
            return to_route('admin.notify.sms.index');
        }
    }
}
