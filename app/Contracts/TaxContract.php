<?php

namespace App\Contracts;

/**
 * Interface CityContract
 * @package App\Contracts
 */
interface TaxContract
{
  /**
   * @param string $order
   * @param string $sort
   * @param array $columns
   * @return mixed
   */
  public function listTax(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

  /**
   * @param int $id
   * @return mixed
   */
  public function findTaxById(int $id);

  /**
   * @param array $params
   * @return mixed
   */
  public function createTax(array $params);

  /**
   * @param array $params
   * @return mixed
   */
  public function updateTax(array $params);

  /**
   * @param $id
   * @return bool
   */
  public function deleteTax($id);
}
