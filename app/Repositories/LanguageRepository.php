<?php
namespace App\Repositories;

class LanguageRepository extends Repository implements CityRepositoryInterface
{

    /**
     * @param $data
     * @param $required
     * Data is an array, in most cases given by request paramteres
     * The actuall data are in the second layer $data['city']
     */
    public function getOrCreate(Array $data, $required = true){

        //@todo: check for city_id or city_name or postalcode
        if(isset($data['language_id'])){
            $this->model = Language::where('id', $data['language_id'])->first();
            return $this->model;
        }
        if(isset($data['language']['id'])){
            $this->model = Language::where('id', $data['language']['id'])->first();
            return $this->model;
        }
        //@todo: Create new Language if needed and all needed information are provided

        if($required) {
            abort(409, "The provided data does not allow to identify or to create a new language");
        }
        return null;
    }
}
