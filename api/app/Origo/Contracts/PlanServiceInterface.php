<?php


namespace App\Origo\Contracts;


use App\Origo\Contracts\Service\RenderEditInterface;
use App\Origo\Contracts\Service\RenderListInterface;

interface PlanServiceInterface extends RenderListInterface, RenderEditInterface
{
}
