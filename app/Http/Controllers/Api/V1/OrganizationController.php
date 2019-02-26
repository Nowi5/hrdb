<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use App\Models\Organization;
use App\Models\Location;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\OrganizationCollection;
use App\Http\Resources\OrganizationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Repositories\CurrencyRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;

class OrganizationController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $organizations = QueryBuilder::for(Organization::class)
            ->allowedFilters('name')
            ->allowedIncludes('users', 'jobpostings', 'location')
            ->paginate();

        return OrganizationResource::collection($organizations);
    }

    public function show(Organization $organization)
    {
        OrganizationResource::withoutWrapping();
        return new OrganizationResource($organization);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // Check for input data
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'founded' => 'digits:4|integer|min:1900|max:'.(date('Y')+1) //@todo: Add message
            //@todo: Add other validators
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Creating Organization failed'
            ], 401);
        }

        $organization = Organization::firstOrCreate(
            [
                'name'      => $data['name'],
            ],
            [
                'website' => (isset($data['website']) ? $data['website'] : ''),
                'logo_url' => (isset($data['logo_url']) ? $data['logo_url'] : ''),
                'description' => (isset($data['description']) ? $data['description'] : ''),
                'founded' => (isset($data['founded']) ? $data['founded'] : ''),
                'domain' => (isset($data['domain']) ? $data['domain'] : '')
            ]
        );

        if ($organization->wasRecentlyCreated === true) {
            $msg = 'Successfully created Organization!';
        } else {
            $msg = 'Organization already existed - updated';
        }

        return OrganizationResource::make($organization)
            ->additional(['message' => $msg]);
    }

    public function update(Request $request, Organization $organization)    
    {
        //@todo: Add Validation

        //@todo: You should be only able to make updates if you have created, if you belong to organization(?!) or if your validated email belong to organizatin
        $organization->update($request->all());
        return response()->json($organization, 200);
    }

    // There should be no need to update or delete countries, instead create new
    /*
    public function delete(Organization $organization)    
    {
        $organization->delete();
        return response()->json(null, 204);
    }
    */

    public function userOrganization(){
        $organization = \Auth::user()->organization;
        if($organization) {
            return $this->show($organization);
        }
        else{
            abort(404, 'User does not have Organization assigned');
        }
    }

    public function userOrganizationUpdate(Request $request){
        $organization = \Auth::user()->organization;
        if($organization) {
            return $this->update($request, $organization);
        }
        else{
            abort(404, 'User does not have Organization assigned');
        }
    }
}
