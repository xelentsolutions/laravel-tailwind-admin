<?php

namespace App\Repositories;

use App\Models\Tax;
use App\Contracts\TaxContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class TaxRepository
 *
 * @package \App\Repositories
 */
class TaxRepository extends BaseRepository implements TaxContract
{

  /**
   * TaxRepository constructor.
   * @param Taxs $model
   */
  public function __construct(Tax $model)
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
  public function listTax(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
  {
    return $this->all($columns, $order, $sort);
  }

  /**
   * @param int $id
   * @return mixed
   * @throws ModelNotFoundException
   */
  public function findTaxById(int $id)
  {
    try {
      return $this->findOneOrFail($id);
    } catch (ModelNotFoundException $e) {

      throw new ModelNotFoundException($e);
    }
  }

  /**
   * @param array $params
   * @return Tax|mixed
   */
  public function createTax(array $params)
  {
    try {
      $collection = collect($params);

      $status = $collection->has('status') ? 1 : 0;

      $merge = $collection->merge(compact('status'));

      $Tax = new Tax($merge->all());

      $Tax->save();

      return $Tax;
    } catch (QueryException $exception) {
      throw new InvalidArgumentException($exception->getMessage());
    }
  }

  /**
   * @param array $params
   * @return mixed
   */
  public function updateTax(array $params)
  {
    $Tax = $this->findTaxById($params['id']);

    $collection = collect($params)->except('_token');

    $status = $collection->has('status') ? 1 : 0;

    $merge = $collection->merge(compact('status'));

    $Tax->update($merge->all());

    return $Tax;
  }

  /**
   * @param $id
   * @return bool|mixed
   */
  public function deleteTax($id)
  {
    $Tax = $this->findTaxById($id);

    $Tax->delete();

    return $Tax;
  }
}
