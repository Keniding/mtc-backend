<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index() {
        $countries = Country::all();
        return $countries;
    }

    public function show(Country $country) {
        return $country;
    }

    public function create() {
        return;
    }

    public function createSlug($string, $id) {
        $slug = str_replace(' ', '-', $string);
        $slug = strtolower($slug);
        $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        $slug = trim($slug, '-');
        $slug = $slug . '-' . $id;
        return $slug;
    }

    public function store() {
        $country = new Country();
        $country->nombre = request('nombre');
        $country->slug = '';
        $country->description = request('description');
        $country->poblacion = request('poblacion');
        $country->area = request('area');
        $country->save();

        $country->slug = $this->createSlug($country->nombre, $country->id);
        $country->save();
        return $country;
    }

    public function edit(Country $country) {
        return $country;
    }

    public function update(Country $country) {
        $country = new Country();
        $country->nombre = request('nombre');
        $country->description = request('description');
        $country->poblacion = request('poblacion');
        $country->area = request('area');
        $country->save();
        return $country;
    }

    public function destroy(Country $country) {
        $country->delete();
        $countries = Country::all();
        return $countries;
    }
}
