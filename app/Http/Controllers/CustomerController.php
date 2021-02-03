<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CustomerContract;
use App\Http\Controllers\BaseController;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends BaseController
{
    /**
     * @var CustomerContract
     */
    protected $CustomerRepository;

    /**
     * CustomerController constructor.
     * @param CustomerContract $CustomerRepository
     */
    public function __construct(CustomerContract $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $customers = $this->CustomerRepository->listCustomer();
        return view('customers.index', compact('customers'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $cities = $this->CustomerRepository->getCity();
        return view('customers.create', compact('cities'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
        ]);

         $params = $request->except('_token');

         $Customer = $this->CustomerRepository->createCustomer($params);

        if (!$Customer) {
            return $this->responseRedirectBack('Error occurred while creating Customer.', 'error', true, true);
        }
        return $this->responseRedirect('customers.index', 'Customer added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
       $customer = $this->CustomerRepository->findCustomerById($id);
       $cities = $this->CustomerRepository->getCity();
       return view('customers.edit', compact('customer','cities'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
       $customer = $this->CustomerRepository->ShowCustomerById($id);
       return view('customers.show', compact('customer'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
        ]);

        $params = $request->except('_token');

        $Customer = $this->CustomerRepository->updateCustomer($params);

        if (!$Customer) {
            return $this->responseRedirectBack('Error occurred while updating Customer.', 'error', true, true);
        }
        return $this->responseRedirect('customers.index', 'Customer updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $Customer = $this->CustomerRepository->deleteCustomer($id);

        if (!$Customer) {
            return $this->responseRedirectBack('Error occurred while deleting Customer.', 'error', true, true);
        }
        return $this->responseRedirect('customers.index', 'Customers deleted successfully', 'success', false, false);
    }

    public function customer_contact_destroy(Request $request)
    {
        $status = 'error';
        $Customer = $this->CustomerRepository->deleteCustomerContactInfo($request->id);

        if (!$Customer) {
            $status = 'success';
        }
        return response()->json([
            'status' => $status
        ]);
    }
}
