<?php

namespace App\Services;

use App\Interfaces\GitServiceInterface;
use App\Interfaces\GitServiceStrategyInterface;
use App\ValueObject\Git\BranchName;
use App\ValueObject\Git\RepositoryName;

class GitService implements GitServiceInterface
{
    private GitServiceStrategyInterface $gitService;

    public function __construct(GitServiceStrategyInterface $gitService)
    {
        $this->gitService = $gitService;
    }

    public function getGitBranchLastCommitHash(RepositoryName $repositoryName, BranchName $branchName) {
        return $this->gitService->getGitBranchLastCommitHash($repositoryName, $branchName);
    }
}
