<?php

namespace App\Contracts;

/**
 * Interface CityContract
 * @package App\Contracts
 */
interface UomContract
{
  /**
   * @param string $order
   * @param string $sort
   * @param array $columns
   * @return mixed
   */
  public function listUom(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

  /**
   * @param int $id
   * @return mixed
   */
  public function findUomById(int $id);

  /**
   * @param array $params
   * @return mixed
   */
  public function createUom(array $params);

  /**
   * @param array $params
   * @return mixed
   */
  public function updateUom(array $params);

  /**
   * @param $id
   * @return bool
   */
  public function deleteUom($id);
}
