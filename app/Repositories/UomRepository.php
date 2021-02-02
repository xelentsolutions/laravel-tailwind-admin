<?php

namespace App\Repositories;

use App\Models\Uom;
use App\Contracts\UomContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class UomRepository
 *
 * @package \App\Repositories
 */
class UomRepository extends BaseRepository implements UomContract
{

  /**
   * UomRepository constructor.
   * @param Uom $model
   */
  public function __construct(Uom $model)
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
  public function listUom(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
  {
    return $this->all($columns, $order, $sort);
  }

  /**
   * @param int $id
   * @return mixed
   * @throws ModelNotFoundException
   */
  public function findUomById(int $id)
  {
    try {
      return $this->findOneOrFail($id);
    } catch (ModelNotFoundException $e) {

      throw new ModelNotFoundException($e);
    }
  }

  /**
   * @param array $params
   * @return Uom|mixed
   */
  public function createUom(array $params)
  {
    try {
      $collection = collect($params);

      $status = $collection->has('status') ? 1 : 0;

      $merge = $collection->merge(compact('status'));

      $Uom = new Uom($merge->all());

      $Uom->save();

      return $Uom;
    } catch (QueryException $exception) {
      throw new InvalidArgumentException($exception->getMessage());
    }
  }

  /**
   * @param array $params
   * @return mixed
   */
  public function updateUom(array $params)
  {
    $Uom = $this->findUomById($params['id']);

    $collection = collect($params)->except('_token');

    $status = $collection->has('status') ? 1 : 0;

    $merge = $collection->merge(compact('status'));

    $Uom->update($merge->all());

    return $Uom;
  }

  /**
   * @param $id
   * @return bool|mixed
   */
  public function deleteUom($id)
  {
    $Uom = $this->findUomById($id);

    $Uom->delete();

    return $Uom;
  }
}
