<?php
namespace App\Repositories\Item;

use App\Repositories\Base\BaseRepository;
use App\Models\Item;

class ItemRepository extends BaseRepository implements ItemInterface
{
        
    public function __construct(Item $item)
    {
        // $model inherited from Base Repository
        $this->model = $item;
    }
}