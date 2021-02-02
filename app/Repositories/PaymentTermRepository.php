<?php

namespace App\Repositories;

use App\Models\PaymentTerms;
use App\Contracts\PaymentTermContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class PaymentTermRepository
 *
 * @package \App\Repositories
 */
class PaymentTermRepository extends BaseRepository implements PaymentTermContract
{

  /**
   * PaymentTermRepository constructor.
   * @param PaymentTerms $model
   */
  public function __construct(PaymentTerms $model)
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
  public function listPaymentTerm(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
  {
    return $this->all($columns, $order, $sort);
  }

  /**
   * @param int $id
   * @return mixed
   * @throws ModelNotFoundException
   */
  public function findPaymentTermById(int $id)
  {
    try {
      return $this->findOneOrFail($id);
    } catch (ModelNotFoundException $e) {

      throw new ModelNotFoundException($e);
    }
  }

  /**
   * @param array $params
   * @return PaymentTerm|mixed
   */
  public function createPaymentTerm(array $params)
  {
    try {
      $collection = collect($params);

      $status = $collection->has('status') ? 1 : 0;

      $merge = $collection->merge(compact('status'));

      $PaymentTerm = new PaymentTerms($merge->all());

      $PaymentTerm->save();

      return $PaymentTerm;
    } catch (QueryException $exception) {
      throw new InvalidArgumentException($exception->getMessage());
    }
  }

  /**
   * @param array $params
   * @return mixed
   */
  public function updatePaymentTerm(array $params)
  {
    $PaymentTerm = $this->findPaymentTermById($params['id']);

    $collection = collect($params)->except('_token');

    $status = $collection->has('status') ? 1 : 0;

    $merge = $collection->merge(compact('status'));

    $PaymentTerm->update($merge->all());

    return $PaymentTerm;
  }

  /**
   * @param $id
   * @return bool|mixed
   */
  public function deletePaymentTerm($id)
  {
    $PaymentTerm = $this->findPaymentTermById($id);

    $PaymentTerm->delete();

    return $PaymentTerm;
  }
}
