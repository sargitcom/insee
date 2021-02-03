<?php

namespace App\Factory;

class GitServiceFactory
{
    public static function getGitServiceByName(string $gitServiceName = 'github')
    {
        $pathToGitServiceConfig = dirname(dirname(__DIR__))  . "/config/GitServiceConfig.php";

        $strategies = require_once($pathToGitServiceConfig);

        if (!array_key_exists($gitServiceName, $strategies)) {
            throw new \Exception("No such git service available");
        }

        return new $strategies[$gitServiceName]();
    }
}
