<?php

namespace App\Strategy\GitServiceStrategy;

use App\Interfaces\GitServiceStrategyInterface;
use App\ValueObject\Git\BranchName;
use App\ValueObject\Git\RepositoryName;

class GithubServiceStrategy implements GitServiceStrategyInterface
{
    public function getGitBranchLastCommitHash(RepositoryName $repositoryName, BranchName $branch)
    {
        return exec("git ls-remote https://github.com/{$repositoryName->getRepositoryName()}.git {$branch->getBranchName()} | cut -f 1");
    }
}
