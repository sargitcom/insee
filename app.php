<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/autoload.php');

try {
    $gitServiceName = 'github';

    if (count($argv) === 4) {
        $gitServiceName = isset($argv[1]) ? $argv[1] : null;
        $gitServiceNameParts = explode("=", $gitServiceName);
        if ($gitServiceNameParts[0] !== '--service') {
            throw new \Exception("Malformed service parameter");
        }
        $gitServiceName = $gitServiceNameParts[1];

        $repositoryName = isset($argv[2]) ? $argv[2] : null;
        $branchName = isset($argv[3]) ? $argv[3] : null;
    } else {
        $repositoryName = isset($argv[1]) ? $argv[1] : null;
        $branchName = isset($argv[2]) ? $argv[2] : null;
    }

    if ($repositoryName === null) {
        echo "Repository name can't be empty\n";
        return;
    }

    if ($branchName === null) {
        echo "Branch name can't be empty\n";
        return;
    }

    $gitService = new \App\Services\GitService(
        \App\Factory\GitServiceFactory::getGitServiceByName($gitServiceName)
    );

    $gitServiceResponse = $gitService->getGitBranchLastCommitHash(
        new \App\ValueObject\Git\RepositoryName($repositoryName),
        new \App\ValueObject\Git\BranchName($branchName)
    );

    echo $gitServiceResponse . "\n";
} catch (\Throwable $e) {
    echo $e->getMessage() . "\n";
}
