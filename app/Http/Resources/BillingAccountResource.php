<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillingAccountResource extends JsonResource
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
            'name' => $this->account_name ,
            'email' => $this->email,

            // 🔹 Computed field
            'status' => $this->status,
            'status_label' => $this->status ? 'Active' : 'Inactive',

            // 🔹 Date formatting
            'created_at' => $this->created_at->format('Y-m-d'),
            'created_human' => $this->created_at->diffForHumans(),

            // 🔹 Relationship
            // 'user' => [
            //     'id' => optional($this->user)->id,
            //     'name' => optional($this->user)->name,
            //     'email' => optional($this->user)->email,
            // ],
            // Why optional() Is Important
            // Without it:
            // API crashes if user_id is null
            // With it:
            // Safe response
            // No errors
            'user' => $this->whenLoaded('user', function () {
                return [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                    'email' => $this->user->email,
                ];
            }),
            // in out put ship the user data object 

        ];
    }
}
