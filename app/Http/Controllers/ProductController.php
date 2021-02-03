<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends BaseController
{
    /**
     * @var ProductContract
     */
    protected $ProductRepository;

    /**
     * ProductController constructor.
     * @param ProductContract $ProductRepository
     */
    public function __construct(ProductContract $ProductRepository)
    {
        $this->ProductRepository = $ProductRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = $this->ProductRepository->listProduct();
        return view('products.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $uoms = $this->ProductRepository->getUom();
        return view('products.create', compact('uoms'));
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

         $Product = $this->ProductRepository->createProduct($params);

        if (!$Product) {
            return $this->responseRedirectBack('Error occurred while creating Product.', 'error', true, true);
        }
        return $this->responseRedirect('products.index', 'Product added successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
       $product = $this->ProductRepository->findProductById($id);
       $uoms = $this->ProductRepository->getUom();
       return view('products.edit', compact('product','uoms'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
       $product = $this->ProductRepository->ShowProductById($id);
       return view('products.show', compact('product'));
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

        $Product = $this->ProductRepository->updateProduct($params);

        if (!$Product) {
            return $this->responseRedirectBack('Error occurred while updating Product.', 'error', true, true);
        }
        return $this->responseRedirect('products.index', 'Product updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $Product = $this->ProductRepository->deleteProduct($id);

        if (!$Product) {
            return $this->responseRedirectBack('Error occurred while deleting Product.', 'error', true, true);
        }
        return $this->responseRedirect('products.index', 'Product deleted successfully', 'success', false, false);
    }
}
