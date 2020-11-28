<?php
namespace App\Repositories\BillingAddress;

use App\Repositories\Base\BaseRepository;
use App\Models\BillingAddress;

class ContactPersonRepository extends BaseRepository implements BillingAddressInterface
{
    
    public function __construct(BillingAddress $billingAddress)
    {
        // $model property inherited from Base Repository
        $this->model = $billingAddress;
    }
}
