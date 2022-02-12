<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    const WEATHER_API_URL = 'https://public.opendatasoft.com/api/records/1.0/search/?dataset=arome-0025-enriched&q=plouguerneau&facet=commune&facet=code_commune';
    const OPENWEATHER_API_URL = 'api.openweathermap.org/data/2.5/forecast?q=Plouguerneau&units=metric&appid=939e5900970b94b5631a046c309b33f4';
    const TIDE_API_URL = 'https://services.data.shom.fr/spm/listHarbors';


    public function getWeatherData() {
        return Http::get(self::OPENWEATHER_API_URL);
    }

    public function getTideData() {
        return Http::get(self::TIDE_API_URL);
    }
}
