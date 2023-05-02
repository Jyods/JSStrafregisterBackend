<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\MemberResource;

class FileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'Eintrag',
            'id' => $this->id,
            'definition' => $this->definition,
            'date' => $this->date,
            'fine' => $this->fine,
            'article' => $this->article,
            'isRestricted' => $this->isRestricted,
            'restrictionClass' => $this->restrictionClass,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'member' => new MemberResource($this->member),
        ];
    }
}
