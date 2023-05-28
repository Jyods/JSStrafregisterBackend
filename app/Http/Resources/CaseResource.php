<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Controllers\LoginController;

use App\Http\Resources\LawResource;
use App\Http\Resources\FileLawResource;
use App\Models\FileLaw;
use App\Models\Rank;

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
                'isRestricted' => $this->isRestricted,
                'restrictionClass' => $this->restrictionClass,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'user' => new UserResource($this->user),
                'laws' => FileLawResource::collection(FileLaw::where('file_id', $this->id)->get()),
                'rank' => RankResource::collection(Rank::where('id', $this->rank_id)->get()),
            ];
        } else {
            return [
                'type' => 'Eintrag',
                'id' => $this->id,
                'definition' => preg_replace("/[a-zA-Z]/", "█", $this->definition),
                'description' => preg_replace("/[a-zA-Z]/", "█", $this->description),
                'date' => 'Restricted',
                'fine' => 'Restricted',
                'isRestricted' => true,
                'restrictionClass' => $this->restrictionClass,
                'created_at' => 'Restricted',
                'updated_at' => 'Restricted',
                'user' => 'Restricted',
                'laws' => 'Restricted',
                'rank' => 'Restricted',
            ];
        }
        return [
            'type' => 'Eintrag',
            'definition' => $this->isRestricted ? 'Restricted' : $this->definition,
            'description' => $this->isRestricted ? $str : $this->description,
            'date' => $this->isRestricted ? 'Restricted' : $this->date,
            'fine' => $this->isRestricted ? 'Restricted' : $this->fine,
            'isRestricted' => $this->isRestricted,
            'restrictionClass' => $this->restrictionClass,
            'created_at' => $this->isRestricted ? 'Restricted' : $this->created_at,
            'updated_at' => $this->isRestricted ? 'Restricted' : $this->updated_at,
            'user' => $this->isRestricted ? 'Restricted' : new UserResource($this->user),
            'laws' => $this->isRestricted ? 'Restricted' : FileLawResource::collection(FileLaw::where('file_id', $this->id)->get()),
            'rank' => $this->isRestricted ? 'Restricted' : RankResource::collection(Rank::where('id', $this->rank_id)->get()),
        ];
    }
}
