<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Item\ItemInterface;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    
    protected $itemRepository;

    public function __construct(ItemInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->itemRepository->all();  

        $itemCollection = ItemResource::collection($items);
        return $itemCollection;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'type'=>'required',
            'name'=>'required',
            'unit'=>'required',
            'selling_price'=>'required',
            'description'=>'nullable'
        ]);
        
        $item = $this->itemRepository->create($data);
        if ($item) {
            return response([
                'data'=>new ItemResource($item)
            ],201);
        } else {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->itemRepository->find($id);
        
        if ($data) {
            return $data;
        } else {
            return 'Not found';
        }
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request,[
            'type'=>'required',
            'name'=>'required',
            'unit'=>'required',
            'selling_price'=>'required',
            'description'=>'nullable'
        ]);

        $status = $this->itemRepository->update($id, $data);

        if ($status) {
            return 'Updated';
        } else {
            return 'Not Updated';
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->itemRepository->find($id);
        if ($data) {
            return $this->itemRepository->delete($id);
        } else {
            return 'Not Found';
        }
    }
}
