<?php
namespace App\Repositories\ContactPerson;

use App\Repositories\Base\BaseRepository;
use App\Models\ContactPerson;

class ContactPersonRepository extends BaseRepository implements ContactPersonInterface
{
    
    public function __construct(ContactPerson $contactPerson)
    {
        // $model property inherited from Base Repository
        $this->model = $contactPerson;
    }
}
