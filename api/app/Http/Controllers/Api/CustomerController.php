<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerPost;
use App\Http\Requests\UpdateCustomerPost;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\CustomersCollection;
use App\Origo\Service\CustomerService;
use Exception;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        try {
            $customers = $this->customerService->renderList();
            return new CustomersCollection($customers);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function show(int $customerId)
    {
        try {
            $customer = $this->customerService->renderEdit($customerId);
            return new CustomerResource($customer);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }
    }


    public function store(StoreCustomerPost $request)
    {
        try {
            $customer = $this->customerService->buildInsert($request->all());
            return response()->json(new CustomerResource($customer), 201);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], $exception->getCode());
        }
    }

    public function update(int $customerId, UpdateCustomerPost $request)
    {
        try {
            $this->customerService->buildUpdate($customerId, $request->all());
            $customer = $this->customerService->renderEdit($customerId);
            return response()->json(new CustomerResource($customer), 200);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function destroy(int $customerId)
    {
        try {
            $this->customerService->buildDelete($customerId);
            return response()->json([], 204);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }
}
