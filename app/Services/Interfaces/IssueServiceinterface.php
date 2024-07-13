<?php

namespace App\Services\Interfaces;

use Symfony\Component\HttpFoundation\ParameterBag;

interface IssueServiceinterface
{
    public function getIssues(ParameterBag $filters);
}
