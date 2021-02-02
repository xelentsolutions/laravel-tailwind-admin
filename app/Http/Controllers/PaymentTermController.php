<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\PaymentTermContract;
use App\Http\Controllers\BaseController;

/**
 * Class PaymentTermController
 * @package App\Http\Controllers
 */
class PaymentTermController extends BaseController
{
    /**
     * @var PaymentTermContract
     */
    protected $PaymentTermRepository;

    /**
     * PaymentTermController constructor.
     * @param PaymentTermContract $PaymentTermRepository
     */
    public function __construct(PaymentTermContract $PaymentTermRepository)
    {
        $this->PaymentTermRepository = $PaymentTermRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $PaymentTerms = $this->PaymentTermRepository->listPaymentTerm();

        $this->setPageTitle('Payment Terms', 'List of all Payment Terms');
        return view('payment-terms.index', compact('PaymentTerms'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {

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

        $PaymentTerm = $this->PaymentTermRepository->createPaymentTerm($params);

        if (!$PaymentTerm) {
            return $this->responseRedirectBack('Error occurred while creating Payment Terms.', 'error', true, true);
        }
        return $this->responseRedirect('payment-terms.index', 'Payment Terms added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetPaymentTerm = $this->PaymentTermRepository->findPaymentTermById($id);
        //$cities = $this->PaymentTermRepository->treeList();

        return response()->json([
            'status' => 'success',
            'PaymentTerms' => $targetPaymentTerm
        ]);
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

        $PaymentTerm = $this->PaymentTermRepository->updatePaymentTerm($params);

        if (!$PaymentTerm) {
            return $this->responseRedirectBack('Error occurred while updating Payment Terms.', 'error', true, true);
        }
        return $this->responseRedirectBack('Payment Terms updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $PaymentTerm = $this->PaymentTermRepository->deletePaymentTerm($id);

        if (!$PaymentTerm) {
            return $this->responseRedirectBack('Error occurred while deleting Payment Terma.', 'error', true, true);
        }
        return $this->responseRedirect('payment-terms.index', 'Payment Terms deleted successfully', 'success', false, false);
    }
}
