<?php
namespace App\Repositories;
use App\Models\State;

class StateRepository extends Repository implements StateRepositoryInterface
{

    /**
     * @param $data
     * @param $required
     * Data is an array, in most cases given by request paramteres
     * The actuall data are in the second layer $data['city']
     */
    public function getOrCreate(Array $data, $required = true){


        if(isset($data['state_id'])){
            $this->model = State::where('id', $data['state_id'])->first();
            return $this->model;
        }
        if(isset($data['state']['id'])){
            $this->model =  State::where('id', $data['state']['id'])->first();
            return $this->model;
        }

        if(isset($data['state']['name'])){
            $this->model =  State::where('name', $data['state']['name'])->first();
            return $this->model;
        }

        //@todo: Create new State if needed and all needed information are provided

        if($required) {
            abort(409, "The provided data does not allow to identify or to create a new state");
        }
        return null;
    }
}
