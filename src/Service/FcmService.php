<?php

namespace YourVendor\FcmNotifications\Service;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FcmService
{
    protected $messaging;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(base_path('firebase-credentials.json'));

        $this->messaging = $factory->createMessaging();
    }

    public function send($token, $title, $body)
    {
        $message = CloudMessage::withTarget('token', $token)
            ->withNotification(
                Notification::create($title, $body)
            );

        return $this->messaging->send($message);
    }
}