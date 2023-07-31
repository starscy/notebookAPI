<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotebookResource extends JsonResource implements Resource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'company' => $this->company,
            'phone' => $this->phone,
            'email' => $this->email,
            'birthday' => $this->birthday,
            'photo' => $this->photo,
        ];
    }
}
