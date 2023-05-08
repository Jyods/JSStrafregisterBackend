<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Controllers\LoginController;

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
        $class = LoginController::getUser();
        if ($this->restrictionClass <= $class) {
            return [
                'type' => 'Eintrag',
                'id' => $this->id,
                'definition' => $this->definition,
                'description' => $this->description,
                'date' => $this->date,
                'fine' => $this->fine,
                'article' => $this->article,
                'isRestricted' => $this->isRestricted,
                'restrictionClass' => $this->restrictionClass,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'user' => new UserResource($this->user),
            ];
        } else {
            return [
                'type' => 'Eintrag',
                'id' => $this->id,
                'definition' => preg_replace("/[a-zA-Z]/", "█", $this->definition),
                'description' => preg_replace("/[a-zA-Z]/", "█", $this->description),
                'date' => 'Restricted',
                'fine' => 'Restricted',
                'article' => 'Restricted',
                'isRestricted' => true,
                'restrictionClass' => $this->restrictionClass,
                'created_at' => 'Restricted',
                'updated_at' => 'Restricted',
                'user' => 'Restricted',
            ];
        }
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
