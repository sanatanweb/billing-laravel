<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'customer_type'=>$this->customer_type,
            'salutation'=>$this->salutation,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'company_name'=>$this->company_name,
            'customer_display_name'=>$this->customer_display_name,
            'mobile_number'=>$this->mobile_number,
            'work_phone'=>$this->work_phone,
            'email_address'=>$this->email_address,
            'website'=>$this->website,
            'remarks'=>$this->remarks,
        ]; 
    }
}
