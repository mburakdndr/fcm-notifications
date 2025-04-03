<?php

use Flarum\Extend;
use Flarum\Notification\NotificationServiceProvider;
use YourVendor\FcmNotifications\Api\Controller\FcmTokenController;
use YourVendor\FcmNotifications\Notification\FcmNotificationDriver;
use YourVendor\FcmNotifications\Service\FcmService;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js'),

    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),

    (new Extend\Routes('api'))
        ->post('/fcm-token', 'fcm.token.store', FcmTokenController::class),

    (new Extend\ServiceProvider())
        ->register(FcmService::class),

    (new Extend\NotificationDriver())
        ->add('fcm', FcmNotificationDriver::class),

    (new Extend\Migration())
        ->add(__DIR__.'/migrations/2024_03_21_000000_add_fcm_tokens.php'),
];