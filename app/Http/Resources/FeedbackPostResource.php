<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FeedbackPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = 'feedback_added';

    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'comment' => $this->comment,
            'score' => $this->score,
            'checkup_id' => $this->checkup_id,
            'checkup_category' => $this->checkup_category,
            'feedback_category' => $this->feedback_category,
            'animal_category' => $this->animal_category
        ];
    }

    public function with(Request $request) {
        return [
            'status' => true,
            'message' => 'Success'
        ];
    }
}
