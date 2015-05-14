<?php

$c = new Pimple\Container();

$c['config'] = function() {
    return new \Lib\Config('dasdsd');
};

$c['zendesk'] = function() {
    return new \MicroApp\Zendesk();
};

$c['command.get'] = function($c) {
    return new \MicroApp\Command\ZendeskCommand($c['zendesk']);
};

$c['commands'] = function($c) {
    return array(
        $c['command.get']
    );
};

$c['application'] = function($c) {
    $application = new \Symfony\Component\Console\Application();
    $application->addCommands($c['commands']);
    return $application;
};

return $c;