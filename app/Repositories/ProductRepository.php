<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Uom;
use App\Contracts\ProductContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


/**
 * Class ProductRepository
 *
 * @package \App\Repositories
 */
class ProductRepository extends BaseRepository implements ProductContract
{

  /**
   * ProductRepository constructor.
   * @param Product $model
   */
  public function __construct(Product $model)
  {
    parent::__construct($model);
    $this->model = $model;
  }

  /**
   * @param string $order
   * @param string $sort
   * @param array $columns
   * @return mixed
   */
  public function listProduct(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
  {
    return $this->all($columns, $order, $sort);
  }

  /**
   * @param int $id
   * @return mixed
   * @throws ModelNotFoundException
   */
  public function findProductById(int $id)
  {
    try {
      return Product::with('uom')->where('id',$id)->first();
    } catch (ModelNotFoundException $e) {

      throw new ModelNotFoundException($e);
    }
  }


    /**
   * @param int $id
   * @return mixed
   * @throws ModelNotFoundException
   */
  public function ShowProductById(int $id)
  {
    try {
      return Product::with('uom')->where('id',$id)->first();
    } catch (ModelNotFoundException $e) {

      throw new ModelNotFoundException($e);
    }
  }

  /**
   * @param array $params
   * @return Product|mixed
   */
  public function createProduct(array $params)
  {
    try {
      $Product = new Product();
      $Product->name      = $params['name'];
      $Product->sku       = $params['sku'];
      $Product->min_stock = $params['min_qty'];
      $Product->op_qty    = $params['opening_qty'];
      $Product->op_date   = date("Y-m-d", strtotime($params['opening_date']));
      $Product->uom_id    = $params['uom'];
      $Product->save();
    return $Product;

    } catch (QueryException $exception) {
      throw new InvalidArgumentException($exception->getMessage());
    }
  }

  /**
   * @param array $params
   * @return mixed
   */
  public function updateProduct(array $params)
  {
    try {
      $Product = Product::where('id',$params['id'])->first();
      if(isset($Product)){
        $Product->name      = $params['name'];
        $Product->sku       = $params['sku'];
        $Product->min_stock = $params['min_qty'];
        $Product->op_qty    = $params['opening_qty'];
        $Product->op_date   = date("Y-m-d", strtotime($params['opening_date']));
        $Product->uom_id    = $params['uom'];
        $Product->save();

        return $Product;
      }
    } catch (QueryException $exception) {
      throw new InvalidArgumentException($exception->getMessage());
    }
  }

  /**
   * @param $id
   * @return bool|mixed
   */
  public function deleteProduct($id)
  {
    $Product = $this->findProductById($id);
    $Product->delete();

    return $Product;
  }

  public function getUom()
  {
    $uoms = Uom::where('status', 1)->get();
    return $uoms;
  }

}
