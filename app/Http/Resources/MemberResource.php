<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => 'Beamter',
            'identification' => $this->identification,
            'age' => $this->age,
            'is_active' => $this->is_active,
            'entry' => $this->entry,
        ];
    }
}
