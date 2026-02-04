<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => 'Ciudad: ' . $this->name,
            'population' => 'Personas: ' . $this->population,
            'postalcode' => 'Codigo Postal: ' . $this->postalcode,
            'example' => 'Version 1.0 de Frvncisco',
        ];
    }
}