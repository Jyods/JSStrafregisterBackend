<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $str = $this->description;
        $str = preg_replace("/[a-zA-Z]/", "█", $str);
        return [
            'type' => 'Eintrag',
            'id' => $this->id,
            'definition' => $this->isRestricted ? 'Restricted' : $this->definition,
            'description' => $this->isRestricted ? $str : $this->description,
            'date' => $this->isRestricted ? 'Restricted' : $this->date,
            'fine' => $this->isRestricted ? 'Restricted' : $this->fine,
            'article' => $this->isRestricted ? 'Restricted' : $this->article,
            'isRestricted' => $this->isRestricted,
            'restrictionClass' => $this->restrictionClass,
            'created_at' => $this->isRestricted ? 'Restricted' : $this->created_at,
            'updated_at' => $this->isRestricted ? 'Restricted' : $this->updated_at,
            'user' => $this->isRestricted ? 'Restricted' : new UserResource($this->user),
        ];
    }
}
