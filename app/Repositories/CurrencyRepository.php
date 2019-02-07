<?php
namespace App\Repositories;

class CurrencyRepository extends Repository implements CityRepositoryInterface
{

    /**
     * @param $data
     * @param $required
     * Data is an array, in most cases given by request paramteres
     * The actuall data are in the second layer $data['city']
     */
    public function getOrCreate(Array $data, $required = true){

        if(isset($data['currency_id'])){
            $this->model = Currency::where('id', $data['currency_id'])->first();
            return $this->model;
        }
        if(isset($data['currency']['id'])){
            $this->model = Currency::where('id', $data['currency']['id'])->first();
            return $this->model;
        }

        //@todo: Create new Currency if needed and all needed information are provided

        if($required) {
            abort(409, "The provided data does not allow to identify or to create a new currency");
        }
        return null;
    }
}
