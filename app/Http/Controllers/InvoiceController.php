<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Invoice\InvoiceInterface;
use App\Repositories\InvoiceItem\InvoiceItemInterface;

class InvoiceController extends Controller
{
    
    protected $invoiceRepository;
    protected $invoiceItemRepository;
    
    public function __construct(InvoiceInterface $invoiceRepository, InvoiceItemInterface $invoiceItemRepository)
    {
        $this->invoiceRepository = $invoiceRepository;    
        $this->invoiceItemRepository = $invoiceItemRepository;    
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'invoice.customer_id'=>'required',
            'invoice.invoice_date'=>'required',
            'invoice.amount_in_words'=>'required',
            'invoice.status'=>'required',
        ]);
        
        $invoiceData['customer_id'] = $request->invoice['customer_id'];
        $invoiceData['invoice_date'] = $request->invoice['invoice_date']; 
        $invoiceData['amount_in_words'] = $request->invoice['amount_in_words']; 
        $invoiceData['status'] = $request->invoice['status']; 
        $invoiceData['vat_amount']= 0;
        $invoiceData['received_by']='Ramesh KC';
        $invoiceData['subtotal']= 100;
        $invoiceData['total_amount']= 100;
        
        $invoice = $this->invoiceRepository->create($invoiceData);

        $invoiceItems = $request->invoice_items;
        $invoiceItemData = [];

        foreach($invoiceItems as $item) {
            $invoiceItemData['invoice_id'] = $invoice->id;
            $invoiceItemData['item_id'] = $item['item_id']['id'];
            $invoiceItemData['rate'] = $item['rate'];
            $invoiceItemData['quantity'] = $item['quantity'];
            $invoiceItemData['discount'] = $item['discount'];
            $invoiceItemData['discount_type'] = $item['discount_type'];
            $invoiceItemData['subtotal'] = $item['total'];
            $this->invoiceItemRepository->create($invoiceItemData);
        }

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
