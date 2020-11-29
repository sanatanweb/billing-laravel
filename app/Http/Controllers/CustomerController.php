<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Customer\CustomerInterface;
use App\Repositories\BillingAddress\BillingAddressInterface;
use App\Repositories\ContactPerson\ContactPersonInterface;
use App\Http\Resources\CustomerResource;


class CustomerController extends Controller
{
    
    protected $customerRepository;
    protected $billingAddressRepository;
    protected $contactPersonRepository;

    public function __construct(CustomerInterface $customerRepository, BillingAddressInterface $billingAddressRepository, ContactPersonInterface $contactPersonRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->billingAddressRepository = $billingAddressRepository;
        $this->contactPersonRepository = $contactPersonRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerRepository->all();  

        $customerCollection = CustomerResource::collection($customers);
        return $customerCollection;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = $request->customer;
        $billingAddress = $request->billingAddress;
        $contactPerson = $request->contactPerson;
        $customerStatus = $this->customerRepository->create($customer);
        if ($customerStatus) {
            $billingAddress['customer_id'] = $customerStatus->id;
            $billingStatus = $this->billingAddressRepository->create($billingAddress);
            $contactPerson['customer_id'] = $customerStatus->id;
            $contactStatus = $this->contactPersonRepository->create($contactPerson);
            return true;
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
        $data = $this->customerRepository->find($id);
        if ($data) {
            return $this->customerRepository->delete($id);
        } else {
            return 'Not Found';
        }
    }
}
