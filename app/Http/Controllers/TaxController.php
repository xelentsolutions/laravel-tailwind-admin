<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\TaxContract;
use App\Http\Controllers\BaseController;

/**
 * Class TaxController
 * @package App\Http\Controllers
 */
class TaxController extends BaseController
{
    /**
     * @var TaxContract
     */
    protected $TaxRepository;

    /**
     * TaxController constructor.
     * @param TaxContract $TaxRepository
     */
    public function __construct(TaxContract $TaxRepository)
    {
        $this->TaxRepository = $TaxRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $Taxs = $this->TaxRepository->listTax();

        $this->setPageTitle('Taxes', 'List of all Taxes');
        return view('taxes.index', compact('Taxs'));
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

        $Tax = $this->TaxRepository->createTax($params);

        if (!$Tax) {
            return $this->responseRedirectBack('Error occurred while creating tax.', 'error', true, true);
        }
        return $this->responseRedirect('taxes.index', 'Tax added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetTax = $this->TaxRepository->findTaxById($id);
        //$cities = $this->TaxRepository->treeList();

        return response()->json([
            'status' => 'success',
            'Taxs' => $targetTax
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

        $Tax = $this->TaxRepository->updateTax($params);

        if (!$Tax) {
            return $this->responseRedirectBack('Error occurred while updating Tax.', 'error', true, true);
        }
        return $this->responseRedirectBack('Tax updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $Tax = $this->TaxRepository->deleteTax($id);

        if (!$Tax) {
            return $this->responseRedirectBack('Error occurred while deleting Tax.', 'error', true, true);
        }
        return $this->responseRedirect('taxes.index', 'Tax deleted successfully', 'success', false, false);
    }
}
