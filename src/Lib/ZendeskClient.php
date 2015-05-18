<?php

namespace Lib;

use Zendesk\API\Client as ZendeskAPI;

Class ZendeskClient
{
    private $client = array();

    public function __construct($country)
    {
        $subDomain = Config::get("zendesk.$country.sub_domain");
        $username  = Config::get("zendesk.$country.username");
        $token     = Config::get("zendesk.$country.token");

        $this->client = new ZendeskAPI($subDomain, $username);
        $this->client->setAuth('token', $token);
    }

    public function getClient()
    {
        return $this->client;
    }
}
