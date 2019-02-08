<?php
namespace App\Repositories;
use App\Models\City;

class CityRepository extends Repository implements CityRepositoryInterface
{

    /**
     * @param $data
     * @param $required
     * Data is an array, in most cases given by request paramteres
     * The actuall data are in the second layer $data['city']
     */
    public function getOrCreate(Array $data, $required = true){
        if(isset($data['city_id'])){
            $this->model = City::where('id', $data['city_id'])->first();
            return $this->model;
        }
        if(isset($data['city']['id'])){
            $this->model =  City::where('id', $data['city']['id'])->first();
            return $this->model;
        }

        if(isset($data['city']['name'])){
            $this->model =  City::where('name', $data['city']['name'])->first();
            return $this->model;
        }

        if(isset($data['city']['postalcode'])){
            $this->model =  City::where('postalcode', $data['city']['postalcode'])->first();
            return $this->model;
        }

        //@todo: Create new City if needed and all needed information are provided

        if($required) {
            abort(409, "The provided data does not allow to identify or to create a new city");
        }
        return null;
    }
}
