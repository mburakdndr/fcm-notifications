<?php

use Flarum\Database\Migration;
use Illuminate\Database\Schema\Blueprint;

return Migration::createTable(
    'fcm_tokens',
    [
        'id' => [
            'type' => 'integer',
            'unsigned' => true,
            'autoIncrement' => true
        ],
        'user_id' => [
            'type' => 'integer',
            'unsigned' => true,
            'nullable' => false
        ],
        'fcm_token' => [
            'type' => 'string',
            'nullable' => true
        ],
        'device_type' => [
            'type' => 'string',
            'nullable' => true
        ],
        'created_at' => [
            'type' => 'datetime',
            'nullable' => true
        ],
        'updated_at' => [
            'type' => 'datetime',
            'nullable' => true
        ]
    ]
);