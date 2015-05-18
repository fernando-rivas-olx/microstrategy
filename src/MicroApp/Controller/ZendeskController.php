<?php

namespace MicroApp\Controller;

use Lib\Request;
use MicroApp\Model\Zendesk;

class ZendeskController extends BaseController {

    const DEFAULT_PAGINATION = 5;

    public function getInfo()
    {
        $paramas = array('per_page'=> Request::get('per_page', self::DEFAULT_PAGINATION));
        $zen     = new Zendesk();
        $results = $zen->getAll($paramas);

        $this->render($results->tickets);
    }
}
