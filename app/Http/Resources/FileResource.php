<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\UserResource;

use App\Http\Resources\FileLawResource;
use App\Models\FileLaw;

use App\Http\Resources\PublishResource;
use App\Models\Publish;

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
            'description' => substr($this->description, 0, 40) . '...',
            'date' => $this->date,
            'fine' => $this->fine,
            'isRestricted' => false,
            'isRestricted_Normal' => $this->isRestricted,
            'restrictionClass' => $this->restrictionClass,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => new UserResource($this->user),
            'laws' => FileLawResource::collection(FileLaw::where('file_id', $this->id)->get()),
            'publishes' => PublishResource::collection(Publish::where('fileID', $this->id)->get()),
        ];
        /*return [
            'type' => 'Eintrag',
            'id' => $this->id,
            'definition' => $this->isRestricted ? "Restricted" : $this->definition,
            'description' => substr($this->description, 0, 40) . '...',
            'date' => $this->isRestricted ? 'Restricted' : $this->date,
            'fine' => $this->isRestricted ? 'Restricted' : $this->fine,
            'article' => $this->isRestricted ? 'Restricted' : $this->article,
            'isRestricted' => $this->isRestricted,
            'restrictionClass' => $this->restrictionClass,
            'created_at' => $this->isRestricted ? 'Restricted' : $this->created_at,
            'updated_at' => $this->isRestricted ? 'Restricted' : $this->updated_at,
            'user' => $this->isRestricted ? 'Restricted' : new UserResource($this->user),
        ];*/
    }
}
