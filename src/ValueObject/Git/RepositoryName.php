<?php

namespace App\ValueObject\Git;

class RepositoryName
{
    private string $repositoryName;

    public function __construct(string $repositoryName)
    {
        if ($this->isValid($repositoryName) === false) {
            throw new \Exception("Repository name can't be empty");
        }

        $this->repositoryName = $repositoryName;
    }

    protected function isValid(string $repositoryName): bool
    {
        return $repositoryName !== "";
    }

    public function getRepositoryName(): string
    {
        return $this->repositoryName;
    }
}
