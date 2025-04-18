<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderStatusUpdated;
use App\Models\MealPlan;
use App\Traits\HasDataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Helpers\{
    LogActivity,
    Common
};

class OrderController extends Controller
{
    use HasDataTables;
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $trash = $request->get("trash");
            $query = MealPlan::with('menuType')->latest();
            $query = ($trash == "true") ? $query->onlyTrashed() : $query;

            return $this->dataTable($query, 'orders', function ($dataTable) {
                $dataTable->addColumn('type', function ($plan) {
                    return $plan->menuType->type ?? '';
                })->addColumn('name', function ($plan) {
                    return $plan->customer ?  $plan->customer->name : '';
                    })
                    ->addColumn('email', function ($plan) {
                    return $plan->customer ?  $plan->customer->email : '';
                    })
                    ->addColumn('details', function ($plan) {
                        return count($plan->menuItems) > 0  ? '<a href="' . route('admin.orders.details', $plan->id) . '">Custom Menu</a>'  : '';
                    });

            });
        }


        return view('admin.orders.index');
    }

    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in-progress,completed,cancelled',
        ]);

        $order = MealPlan::findOrFail($id);
        $data = $request->all();

        $changes_exist = Common::get_changes($order, $data);
        if ($changes_exist) {
            LogActivity::addToLog('Order status #(' . $order->id . ')', 'update', null, $changes_exist);
            $order->status = $data['status'];
            $order->save();

            $customer = $order->customer;

            if ($customer && $data['status'] != "pending") {
                try {
                    Mail::to($customer->email)->send(new OrderStatusUpdated($order, 'user'));
                    Log::info('Order Update Email send: ' . $customer->email);
                } catch (\Exception $e) {
                    Log::error('Email failed to send: ' . $e->getMessage());
                    return response()->json(['error' => 'Email could not be sent'], 500);
                }
            }
        }


        return response()->json([
            'success' => true,
            'message' => 'Order status updated successfully and emails sent!',
        ]);
    }

    public function edit(MealPlan $mealPlan)
    {
        return view('admin.orders.edit', compact('mealPlan'));
    }

    public function update(Request $request, MealPlan $mealPlan)
    {
        $request->validate([
            'persons' => 'required|integer',
            'phone' => 'required',
            'company' => 'required|string',
            'start_date' => 'required|date',
            'delivery_address' => 'required|string',
        ]);

        $data = $request->all();

        $changes_exist = Common::get_changes($mealPlan, $data);
        if ($changes_exist) {
            LogActivity::addToLog('Order edit #(' . $mealPlan->id . ')', 'update', null, $changes_exist);
            $mealPlan->update($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Order updated successfully!',
            'redirect' => route('admin.orders'),
        ]);
    }


    public function destroy(MealPlan $mealPlan)
    {
        $mealPlan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Menu successfully deleted.',
        ]);
    }

    public function details($id)
    {
        $mealPlan = MealPlan::with([
            'menuItems.menu' => function ($query) {
                $query->select('id', 'name', 'description');
            }
        ])->findOrFail($id);

        return view('admin.orders.details', compact('mealPlan'));
    }
}
