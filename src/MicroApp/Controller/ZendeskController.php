<?php

namespace MicroApp\Controller;

use MicroApp\Model\Zendesk;

class ZendeskController extends BaseController {

    public function getInfo()
    {
        $paramas = array('per_page'=> 2);
        $zen     = new Zendesk();
        $results = $zen->getAll($paramas);

        $this->render($results->tickets);
    }
}
