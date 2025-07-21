<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Hash;
use App\Traits\HasDataTables;
use App\Helpers\{
    LogActivity,
    Common
};
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    use HasDataTables;
    public function index(Request $request)
    {

        if (request()->ajax()) {
            $query = Customer::latest();
            return $this->dataTable(
                $query,
                'customers'
            );
        }

        return view('admin.customers.index');
    }

    public function create()
    {
        return view('admin.customers.edit');
    }

    public function store(CreateCustomerRequest $request)
    {

        $data = $request->validated();
        $data['password'] = Hash::make('12345678');

        $customer = Customer::create($data);

        LogActivity::addToLog('customer', 'insert', $customer, null);

        return response()->json([
            'success' => true,
            'message' => 'customer successfully created.',
            'redirect' => route('admin.customers.index')
        ]);
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function show(string $id)
    {
        //
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $data = $request->validated();

        $changes_exist = Common::get_changes($customer, $data);
        if ($changes_exist) {
            LogActivity::addToLog('customer', 'update', null, $changes_exist);
            $customer->update($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'customer successfully updated.',
            'redirect' => route('admin.customers.index')
        ]);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json([
            'success' => true,
            'message' => 'Customer successfully deleted.'
        ]);
    }
}
