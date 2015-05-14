<?php

namespace MicroApp;

use Lib\Config;
use Zendesk\API\Client as ZendeskAPI;

Class Zendesk
{
    public function getAll($params)
    {
        $subDomain = Config::get('zendesk.ar.sub_domain');
        $username  = Config::get('zendesk.ar.username');
        $token     = Config::get('zendesk.ar.token');

        $client = new ZendeskAPI($subDomain, $username);
        $client->setAuth('token', $token);

        return $client->tickets()->findAll($params);
    }
}