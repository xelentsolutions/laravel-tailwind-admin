<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\City;
use App\Models\CustomerContact;
use App\Contracts\CustomerContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


/**
 * Class CustomerRepository
 *
 * @package \App\Repositories
 */
class CustomerRepository extends BaseRepository implements CustomerContract
{

  /**
   * CustomerRepository constructor.
   * @param Customer $model
   */
  public function __construct(Customer $model)
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
  public function listCustomer(string $order = 'id', string $sort = 'asc', array $columns = ['*'])
  {
    return $this->all($columns, $order, $sort);
  }

  /**
   * @param int $id
   * @return mixed
   * @throws ModelNotFoundException
   */
  public function findCustomerById(int $id)
  {
    try {
      return Customer::with('customerContact')->where('id',$id)->first();
    } catch (ModelNotFoundException $e) {

      throw new ModelNotFoundException($e);
    }
  }


    /**
   * @param int $id
   * @return mixed
   * @throws ModelNotFoundException
   */
  public function ShowCustomerById(int $id)
  {
    try {
      return Customer::with(['customerContact','city'])->where('id',$id)->first();
    } catch (ModelNotFoundException $e) {

      throw new ModelNotFoundException($e);
    }
  }

  /**
   * @param array $params
   * @return Customer|mixed
   */
  public function createCustomer(array $params)
  {
    try {
      $customer = new Customer();
      $customer->name = $params['name'];
      $customer->phone = $params['phone'];
      $customer->mobile = $params['mobile'];
      $customer->email = $params['email'];
      $customer->city_id  = $params['city'];
      $customer->address = $params['address'];
      $customer->save();
      if(isset($params['contact_name'])){
        $count = count($params['contact_name']);
        for($key = 0; $key < $count; $key++)
        {
          $customerContact = new CustomerContact();
          $customerContact->customer_id  =  $customer->id;
          $customerContact->name         =  $params['contact_name'][$key];
          $customerContact->phone        =  $params['contact_phone'][$key];
          $customerContact->mobile       =  $params['contact_mobile'][$key];
          $customerContact->email        =  $params['contact_eamil'][$key];
          $customerContact->save();
        }
    }
    return $customer;

    } catch (QueryException $exception) {
      throw new InvalidArgumentException($exception->getMessage());
    }
  }

  /**
   * @param array $params
   * @return mixed
   */
  public function updateCustomer(array $params)
  {
    try {
      $customer = Customer::where('id',$params['id'])->first();
      if(isset($customer)){
            $customer->name = $params['name'];
            $customer->phone = $params['phone'];
            $customer->mobile = $params['mobile'];
            $customer->email = $params['email'];
            $customer->city_id  = $params['city'];
            $customer->address = $params['address'];
            $customer->save();

            if(isset($params['contact_name']) && count($params['contact_name']) > 0){
              $count = count($params['contact_name']);
              for($key = 0; $key < $count; $key++)
              {
                $customerContact = CustomerContact::where('id',$params['contact_id'][$key])->first();
                if(isset($customerContact)){
                  $customerContact->name         =  $params['contact_name'][$key];
                  $customerContact->phone        =  $params['contact_phone'][$key];
                  $customerContact->mobile       =  $params['contact_mobile'][$key];
                  $customerContact->email        =  $params['contact_eamil'][$key];
                  $customerContact->save();
                }else{
                $customerContact = new CustomerContact();
                $customerContact->customer_id  =  $customer->id;
                $customerContact->name         =  $params['contact_name'][$key];
                $customerContact->phone        =  $params['contact_phone'][$key];
                $customerContact->mobile       =  $params['contact_mobile'][$key];
                $customerContact->email        =  $params['contact_eamil'][$key];
                $customerContact->save();
                }
              }
        }
        return $customer;
      }
    } catch (QueryException $exception) {
      throw new InvalidArgumentException($exception->getMessage());
    }
  }

  /**
   * @param $id
   * @return bool|mixed
   */
  public function deleteCustomer($id)
  {
    $Customer = $this->findCustomerById($id);

    $DeleteCustomerContact = CustomerContact::where('customer_id',$id)->get();
    if(isset($DeleteCustomerContact) && count($DeleteCustomerContact) > 0){
      foreach($DeleteCustomerContact as $CustomerContact){
        $CustomerContact->delete();
      }
    }

    $Customer->delete();

    return $Customer;
  }

  public function getCity()
  {
    $Cities = City::where('status', 1)->get();
    return $Cities;
  }

  /**
   * @param $id
   * @return bool|mixed
   */
  public function deleteCustomerContactInfo($id)
  {
    $CustomerContact = CustomerContact::Where('id',$id)->first();
    $CustomerContact->delete();

    return $CustomerContact;
  }

}
