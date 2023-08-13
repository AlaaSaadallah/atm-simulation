<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
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
            'balance' => $this->balance,
            'branch_number' => $this->branch_number,
            'branch_name' => $this->branch_name,
            'iban' => $this->iban,
            'is_default' => $this->is_default,
            'currency' => new CurrencyResource($this->currency),
        ];
    }
}
