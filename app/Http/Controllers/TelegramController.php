<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TelegramController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message.text');
        $chatId = $request->input('message.chat.id');

        $client = new Client(['base_uri' => 'https://api.telegram.org/bot' . env('TELEGRAM_BOT_TOKEN') . '/']);
        $client->post('sendMessage', [
            'json' => [
                'chat_id' => $chatId,
                'text' => 'You said: ' . $message,
            ],
        ]);

        return 'OK';
    }
    public function start($update)
    {
        $message = $update->getMessage();
        $chat_id = $message->getChat()->getId();
        $text = 'Welcome to my bot!';
        $this->sendMessage($chat_id, $text);
    }

    private function sendMessage($chat_id, $text)
    {
        $data = [
            'chat_id' => $chat_id,
            'text' => $text,
        ];

        Telegram::sendMessage($data);
    }
}
