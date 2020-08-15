<?php


    namespace App\Http\Controllers\Api;


    use App\Http\Controllers\Controller;
    use App\Http\Resources\CustomerCollection;
    use App\Origo\Models\Customer;
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

                return new CustomerCollection($customers);
            } catch (Exception $exception) {
                return response()->json(['error' => $exception->getMessage()], 500);
            }
        }

        public function show(int $customerId)
        {
        }


        public function create()
        {
        }

        public function update(int $customerId, array $data)
        {
        }

        public function destroy(int $customerId)
        {
        }
    }
