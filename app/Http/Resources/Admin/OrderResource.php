<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_id' => $this->user_id,
            'name' =>$this->user->name,
            'shipping_price' => $this->shipping_price,
            'total_price' => $this->total_price,
            'payment_method' => $this->payment_method,
            'order_status' => $this->order_status,
            'payment_status' => $this->payment_status,
        ];
    }
}
