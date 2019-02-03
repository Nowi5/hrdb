<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V1\BaseController As Controller;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\LanguageCollection;
use App\Http\Resources\LanguageResource;
use App\Models\Language;

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
        $language = Language::create($request->all());
        return response()->json($language, 201);
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
