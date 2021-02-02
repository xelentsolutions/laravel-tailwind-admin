<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\UomContract;
use App\Http\Controllers\BaseController;

/**
 * Class UomController
 * @package App\Http\Controllers
 */
class UomController extends BaseController
{
    /**
     * @var UomContract
     */
    protected $UomRepository;

    /**
     * UomController constructor.
     * @param UomContract $UomRepository
     */
    public function __construct(UomContract $UomRepository)
    {
        $this->UomRepository = $UomRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $uoms = $this->UomRepository->listUom();

        $this->setPageTitle('UOM\'s', 'List of all Uom');
        return view('uoms.index', compact('uoms'));
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

        $Uom = $this->UomRepository->createUom($params);

        if (!$Uom) {
            return $this->responseRedirectBack('Error occurred while creating Uom.', 'error', true, true);
        }
        return $this->responseRedirect('uoms.index', 'UOM\'s added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetUom = $this->UomRepository->findUomById($id);
        //$cities = $this->UomRepository->treeList();

        $this->setPageTitle('Cities', 'Edit Uom : ' . $targetUom->name);
        return response()->json([
            'status' => 'success',
            'uoms' => $targetUom
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

        $Uom = $this->UomRepository->updateUom($params);

        if (!$Uom) {
            return $this->responseRedirectBack('Error occurred while updating Uom.', 'error', true, true);
        }
        return $this->responseRedirectBack('UOM\'s updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $Uom = $this->UomRepository->deleteUom($id);

        if (!$Uom) {
            return $this->responseRedirectBack('Error occurred while deleting Uom.', 'error', true, true);
        }
        return $this->responseRedirect('uoms.index', 'UOM\'s deleted successfully', 'success', false, false);
    }
}
