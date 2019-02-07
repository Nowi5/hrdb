<?php
namespace App\Providers;

use App\Models\City;
use App\Repositories\CityRepository;

use App\Models\Country;
use App\Repositories\CountryRepository;

use App\Models\State;
use App\Repositories\StateRepository;

use App\Models\Language;
use App\Repositories\LanguageRepository;

use App\Models\Currency;
use App\Repositories\CurrencyRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    public function register()
    {
        // $this->app->bind('App\Repositories\CityRepositoryInterface', 'App\Repositories\CityRepository');
        $this->app->bind('App\Repositories\CityRepositoryInterface',function(){ return new CityRepository(new City); });
        $this->app->bind('App\Repositories\CountryRepositoryInterface',function(){ return new CountryRepository(new Country); });
        $this->app->bind('App\Repositories\StateRepositoryInterface',function(){ return new StateRepository(new State); });
        $this->app->bind('App\Repositories\LanguageRepositoryInterface',function(){ return new LanguageRepository(new Language); });
        $this->app->bind('App\Repositories\CurrencyRepositoryInterface',function(){ return new CurrencyRepository(new Currency); });

    }
}