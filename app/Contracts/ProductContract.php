<?php

namespace App\Contracts;

/**
 * Interface CityContract
 * @package App\Contracts
 */
interface ProductContract
{
  /**
   * @param string $order
   * @param string $sort
   * @param array $columns
   * @return mixed
   */
  public function listProduct(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

  /**
   * @param int $id
   * @return mixed
   */
  public function findProductById(int $id);

    /**
   * @param int $id
   * @return mixed
   */
  public function ShowProductById(int $id);

  /**
   * @param array $params
   * @return mixed
   */
  public function createProduct(array $params);

  /**
   * @param array $params
   * @return mixed
   */
  public function updateProduct(array $params);

  /**
   * @param $id
   * @return bool
   */
  public function deleteProduct($id);

  public function getUom();
}
