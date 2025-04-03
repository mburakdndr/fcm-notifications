<?php

namespace YourVendor\FcmNotifications\Api\Controller;

use Flarum\Api\Controller\AbstractCreateController;
use Flarum\Http\RequestUtil;
use Flarum\User\User;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;
use Tobscure\JsonApi\Document;

class FcmTokenController extends AbstractCreateController
{
    protected function data(ServerRequestInterface $request, Document $document)
    {
        $actor = RequestUtil::getActor($request);
        $data = Arr::get($request->getParsedBody(), 'data.attributes');

        $actor->fcm_token = $data['token'];
        $actor->device_type = $data['device'];
        $actor->save();

        return $actor;
    }
}