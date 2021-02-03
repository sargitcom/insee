<?php

namespace App\Interfaces;

use App\ValueObject\Git\BranchName;
use App\ValueObject\Git\RepositoryName;

interface GitServiceStrategyInterface
{
    public function getGitBranchLastCommitHash(RepositoryName $repositoryName, BranchName $branch);
}
