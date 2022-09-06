<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'competition' => $this->competition,
            'hometeam' => $this->hometeam,
            'awayteam' => $this->awayteam,
            'titlelong' => $this->titlelong,
            'score' => new ScoreResource($this->whenLoaded('score')) ,
            'date' => $this->date,
            'section' => $this->section
        ];
    }
}
