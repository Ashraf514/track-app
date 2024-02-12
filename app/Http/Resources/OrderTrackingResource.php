<?php

namespace App\Http\Resources;

use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderTrackingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "order_no"          =>  $this->order_no,
            "status"            =>  $this->status,
            "additional_info"   =>  $this->additional_info,
            "created_at"        =>  $this->created_at,
            "updated_at"        =>  $this->updated_at,
            "amount"            =>  $this->amount,
            "allStatus"         =>  OrderStatus::ALL_TYPES
        ];
    }
}
