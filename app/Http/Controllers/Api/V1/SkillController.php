<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use App\Models\City;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\SkillCollection;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\CityRepositoryInterface;

class SkillController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $skills = QueryBuilder::for(Skill::class)
            ->allowedFilters('name')
            ->allowedIncludes('childs', 'parents')
            ->with('parents', 'childs')
            ->paginate();

        return SkillResource::collection($skills);
    }

    public function show(Skill $skill)
    {
        SkillResource::withoutWrapping();
        return new SkillResource($skill);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,[
            'name' => ['required', 'string', 'max:255'],
            //@todo: Add Filter for parents and childs
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Creating skill failed'
            ], 401);
        }

        $skill = Skill::firstOrCreate(['name' => $data['name']]);

        if ($skill->wasRecentlyCreated === true) {
            $msg = 'Skill successfully created!';
        } else {
            $msg = 'Skill already existed!';
        }

        return SkillResource::make($skill)
            ->additional(['message' => $msg]);

    }

    public function update(Request $request, Skill $skill)    
    {
        $skill->update($request->all());
        return response()->json($skill, 200);
    }

    // There should be no need to delete skills, instead create new
    /*
    public function delete(Skill $skill)
    {
        $skill->delete();
        return response()->json(null, 204);
    }
    */
}
