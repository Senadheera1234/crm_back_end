<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);

        // if you wanna show only the followings, use the one below
        // return[
        //     'fullName'=>$this->fullName,
        //     'address'=>$this->address,
        //     'mobileNumber'=>$this->mobileNumber,
        // ];

       
    }
}
