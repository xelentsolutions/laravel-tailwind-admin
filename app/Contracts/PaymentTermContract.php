<?php

namespace App\Contracts;

/**
 * Interface CityContract
 * @package App\Contracts
 */
interface PaymentTermContract
{
  /**
   * @param string $order
   * @param string $sort
   * @param array $columns
   * @return mixed
   */
  public function listPaymentTerm(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

  /**
   * @param int $id
   * @return mixed
   */
  public function findPaymentTermById(int $id);

  /**
   * @param array $params
   * @return mixed
   */
  public function createPaymentTerm(array $params);

  /**
   * @param array $params
   * @return mixed
   */
  public function updatePaymentTerm(array $params);

  /**
   * @param $id
   * @return bool
   */
  public function deletePaymentTerm($id);
}
