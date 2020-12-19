<?php
namespace App\Repositories\Invoice;

use App\Repositories\Base\BaseRepository;
use App\Models\Invoice;

class InvoiceRepository extends BaseRepository implements InvoiceInterface
{
        
    public function __construct(Invoice $invoice)
    {
        // $model property inherited from Base Repository
        $this->model = $invoice;
    }
}