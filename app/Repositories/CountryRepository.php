<?php
namespace App\Repositories;
use App\Models\Country;

class CountryRepository extends Repository implements CountryRepositoryInterface
{

    /**
     * @param $data
     * @param $required
     * Data is an array, in most cases given by request paramteres
     * The actuall data are in the second layer $data['city']
     */
    public function getOrCreate(Array $data, $required = true){

        if(isset($data['country_id'])){
            $this->model = Country::where('id', $data['country_id'])->first();
            return $this->model;
        }
        if(isset($data['country']['id'])){
            $this->model = Country::where('id', $data['country']['id'])->first();
            return $this->model;
        }
        if(isset($data['country']['name'])){
            $this->model = Country::where('name', $data['country']['name'])->first();
            return $this->model;
        }

        //@todo: Create new City if needed and all needed information are provided

        if($required) {
            abort(409, "The provided data does not allow to identify or to create a new country");
        }
        return null;
    }
}
