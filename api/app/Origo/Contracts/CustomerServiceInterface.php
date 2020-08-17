<?php


namespace App\Origo\Contracts;


use App\Origo\Contracts\Service\BuildDeleteInterface;
use App\Origo\Contracts\Service\BuildInsertInterface;
use App\Origo\Contracts\Service\BuildUpdateInterface;
use App\Origo\Contracts\Service\RenderEditInterface;
use App\Origo\Contracts\Service\RenderListPaginateInterface;

interface CustomerServiceInterface extends RenderListPaginateInterface,
    RenderEditInterface,
    BuildUpdateInterface,
    BuildInsertInterface,
    BuildDeleteInterface
{
}
