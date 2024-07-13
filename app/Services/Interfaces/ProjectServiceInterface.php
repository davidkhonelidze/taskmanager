<?php

namespace App\Services\Interfaces;

use Symfony\Component\HttpFoundation\ParameterBag;

interface ProjectServiceInterface
{
    public function getProjects(ParameterBag $filters);
}
