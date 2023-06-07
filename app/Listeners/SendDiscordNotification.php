<?php

namespace App\Listeners;

use App\Events\AccountDeletion;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use GuzzleHttp\Client;
use Illuminate\Support\Carbon;

class SendDiscordNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AccountDeletion  $event
     * @return void
     */
    public function handle(AccountDeletion $event) : void
    {
        if($event->user->delete()){
            $url = config('app.webhook_url');

            $body = json_encode([
                'id' => $event->user->id,
                'nama' => $event->user->name,
                'email' => $event->user->email,
                'keterangan' => 'Menghapus akun',
                'waktu_kejadian' => Carbon::now()->format('d-m-Y H:i')
            ]);
            
            $client = new Client();

            $client->post($url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'content' => $body
                ]
            ]);
        }
    }
}
