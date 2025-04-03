<?php

namespace YourVendor\FcmNotifications\Notification;

use Flarum\Notification\Driver\NotificationDriverInterface;
use Flarum\Notification\Notification;
use YourVendor\FcmNotifications\Service\FcmService;

class FcmNotificationDriver implements NotificationDriverInterface
{
    protected $fcmService;

    public function __construct(FcmService $fcmService)
    {
        $this->fcmService = $fcmService;
    }

    public function send(Notification $notification)
    {
        if (!$notification->user || !$notification->user->fcm_token) {
            return;
        }

        $this->fcmService->send(
            $notification->user->fcm_token,
            $notification->subject->getTitle(),
            $notification->subject->getMessage()
        );
    }
}