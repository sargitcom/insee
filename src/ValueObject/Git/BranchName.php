<?php

namespace App\ValueObject\Git;

class BranchName
{
    private string $branchName;

    public function __construct(?string $branchName = null)
    {
        if ($branchName === null || $branchName === '') {
            $this->branchName = 'master';
            return;
        }

        $this->branchName = $branchName;
    }

    public function getBranchName(): string
    {
        return $this->branchName;
    }
}
