<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\RankResource;

class UserResource extends JsonResource
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
            'isActive' => $this->isActive,
            'restrictionClass' => $this->restrictionClass,
            'email' => $this->email,
            'name' => $this->name,
            //'password' => $this->password,
            'entry' => $this->entry,
            //get the rank name from the rank_id
            'discord' => $this->discord,
            'rank_id' => $this->rank_id,
            'rank' => new RankResource($this->rank),
        ];
    }
}
