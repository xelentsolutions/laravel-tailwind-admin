<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CityContract;
use App\Http\Controllers\BaseController;

/**
 * Class CityController
 * @package App\Http\Controllers
 */
class CityController extends BaseController
{
    /**
     * @var CityContract
     */
    protected $CityRepository;

    /**
     * CityController constructor.
     * @param CityContract $CityRepository
     */
    public function __construct(CityContract $CityRepository)
    {
        $this->CityRepository = $CityRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cities = $this->CityRepository->listCities();

        $this->setPageTitle('Cities', 'List of all cities');
        return view('cities.index', compact('cities'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $cities = $this->CityRepository->treeList();

        $this->setPageTitle('Cities', 'Create City');
        return view('cities.create', compact('cities'));
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

        $City = $this->CityRepository->createCity($params);

        if (!$City) {
            return $this->responseRedirectBack('Error occurred while creating City.', 'error', true, true);
        }
        return $this->responseRedirect('cities.index', 'City added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetCity = $this->CityRepository->findCityById($id);
        //$cities = $this->CityRepository->treeList();

        $this->setPageTitle('Cities', 'Edit City : ' . $targetCity->name);
        return response()->json([
            'status' => 'success',
            'cities' => $targetCity
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

        $City = $this->CityRepository->updateCity($params);

        if (!$City) {
            return $this->responseRedirectBack('Error occurred while updating City.', 'error', true, true);
        }
        return $this->responseRedirectBack('City updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $City = $this->CityRepository->deleteCity($id);

        if (!$City) {
            return $this->responseRedirectBack('Error occurred while deleting City.', 'error', true, true);
        }
        return $this->responseRedirect('cities.index', 'City deleted successfully', 'success', false, false);
    }
}
