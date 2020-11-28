<?php
namespace App\Repositories\BillingAddress;

use App\Repositories\Base\BaseRepository;
use App\Models\BillingAddress;

class BillingAddressRepository extends BaseRepository implements BillingAddressInterface
{
    
    public function __construct(BillingAddress $billingAddress)
    {
        // $model property inherited from Base Repository
        $this->model = $billingAddress;
    }
}
