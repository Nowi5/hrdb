<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\LanguageCollection;
use App\Http\Resources\LanguageResource;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LanguageController extends Controller
{

    public function index()
    {
        $languages = QueryBuilder::for(Language::class)
            ->allowedFilters('iso2', 'name', 'name_long', 'name_lcoal', 'name_english')
            ->paginate();

        return LanguageResource::collection($languages);
    }

    public function show(Language $Language)
    {
        LanguageResource::withoutWrapping();
        return new LanguageResource($Language);
    }

    public function store(Request $request)
    {
        // 'iso2', 'name', 'name_long', 'name_lcoal', 'name_english'
        $data = $request->all();

        $validator = Validator::make($request->all(),[
            'iso2' => ['required', 'string', 'max:8'],
            'name' => ['required', 'string', 'max:255']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors'  => $validator->errors(),
                'message' => 'Creating Language failed'
            ], 401);
        }

        $language = Language::firstOrCreate(
            [
                'iso2'      => $data['iso2'],
                'name'   => $data['name']
            ],
            [
                'name_long' => (isset($data['name_long']) ? $data['name_long'] : ''),
                'name_lcoal' => (isset($data['name_lcoal']) ? $data['name_lcoal'] : ''),
                'name_english' => (isset($data['name_english']) ? $data['name_english'] : ''),
            ]
        );

        if ($language->wasRecentlyCreated === true) {
            $msg = 'Language successfully created!';
        } else {
            $msg = 'Language already existed';
        }

        return LanguageResource::make($language)
            ->additional(['message' => $msg]);
    }


    public function update(Request $request, Language $language)    
    {
        $language->update($request->all());
        return response()->json($language, 200);
    }

    // There should be no need to delete languages, instead create new
    /*
    public function delete(Language $language)    
    {
        $language->delete();
        return response()->json(null, 204);
    }
    */
}
