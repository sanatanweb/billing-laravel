<?php
namespace App\Repositories\InvoiceItem;

use App\Repositories\Base\BaseRepository;
use App\Models\InvoiceItem;

class InvoiceItemRepository extends BaseRepository implements InvoiceItemInterface
{
        
    public function __construct(InvoiceItem $invoiceItem)
    {
        // $model property inherited from Base Repository
        $this->model = $invoiceItem;
    }
}