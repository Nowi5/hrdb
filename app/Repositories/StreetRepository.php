<?php
namespace App\Repositories;
use App\Models\Street;

class StreetRepository extends Repository implements StreetRepositoryInterface
{

    /**
     * @param $data
     * @param $required
     * Data is an array, in most cases given by request paramteres
     * The actuall data are in the second layer $data['city']
     */
    public function getOrCreate(Array $data, $required = true){

        if(isset($data['street_id'])){
            return Street::where('id', $data['street_id'])->first();
        }
        if(isset($data['street']['id'])){
            return Street::where('id', $data['street']['id'])->first();
        }

        //@todo: How to handle where city name is not unique?
        if(isset($data['street']['name'])){
            return Street::where(
                'name', $data['street']['name'],
                'city_id', $data['city']['id']
            )->first();
        }

        if($required) {
            abort(409, "The provided data does not allow to identify or to create a new street");
        }
        return null;
    }
}
