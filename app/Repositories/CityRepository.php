<?php

namespace App\Repositories;

use App\Models\City;
use App\Contracts\CityContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class CityRepository
 *
 * @package \App\Repositories
 */
class CityRepository extends BaseRepository implements CityContract
{

  /**
   * CityRepository constructor.
   * @param City $model
   */
  public function __construct(City $model)
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
  public function listCities(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
  {
    return $this->all($columns, $order, $sort);
  }

  /**
   * @param int $id
   * @return mixed
   * @throws ModelNotFoundException
   */
  public function findCityById(int $id)
  {
    try {
      return $this->findOneOrFail($id);
    } catch (ModelNotFoundException $e) {

      throw new ModelNotFoundException($e);
    }
  }

  /**
   * @param array $params
   * @return City|mixed
   */
  public function createCity(array $params)
  {
    try {
      $collection = collect($params);

      $status = $collection->has('status') ? 1 : 0;

      $merge = $collection->merge(compact('status'));

      $City = new City($merge->all());

      $City->save();

      return $City;
    } catch (QueryException $exception) {
      throw new InvalidArgumentException($exception->getMessage());
    }
  }

  /**
   * @param array $params
   * @return mixed
   */
  public function updateCity(array $params)
  {
    $City = $this->findCityById($params['id']);

    $collection = collect($params)->except('_token');

    $status = $collection->has('status') ? 1 : 0;

    $merge = $collection->merge(compact('status'));

    $City->update($merge->all());

    return $City;
  }

  /**
   * @param $id
   * @return bool|mixed
   */
  public function deleteCity($id)
  {
    $City = $this->findCityById($id);

    $City->delete();

    return $City;
  }
}
