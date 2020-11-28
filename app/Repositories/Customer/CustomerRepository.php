<?php
namespace App\Repositories\Customer;

use App\Repositories\Base\BaseRepository;
use App\Models\Customer;

class CustomerRepository extends BaseRepository implements CustomerInterface
{
    
    public function __construct(Customer $customer)
    {
        // $model property inherited from Base Repository
        $this->model = $customer;
    }
}
