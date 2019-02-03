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

}
