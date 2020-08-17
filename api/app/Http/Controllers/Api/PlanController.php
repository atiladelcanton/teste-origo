<?php


namespace App\Http\Controllers\Api;


use Exception;
use App\Origo\Service\PlanService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PlansCollection;

class PlanController extends Controller
{
    private $planService;

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function index()
    {
        try {
            $plans = $this->planService->renderList();
            return new PlansCollection($plans);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}
