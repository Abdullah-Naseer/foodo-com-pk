<?php

namespace App\Http\Controllers\Site;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Mail\OrderCreated;
use App\Models\Customer;
use App\Models\MealPlan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class OrderController extends Controller
{

    public function createOrder(CreateOrderRequest $request)
    {
        $customer = Customer::create([
            'email' => $request->email,
            'name' => $request->name,
            'company' => $request->company,
            'phone' => $request->phone,
            'address' => $request->delivery_address,
            'password' => Hash::make("12345678"),
        ]);


        if ($customer) {
            LogActivity::addToLog('customer', 'insert', $customer, null);

            $mealPlan = MealPlan::create([
                'customer_id' => $customer->id,
                'menu_type_id' => $request->menu_type_id,
                'persons' => $request->persons,
                'company' => $request->company,
                'phone' => $request->phone,
                'delivery_address' => $request->delivery_address,
                'start_date' => $request->start_date,
            ]);

            LogActivity::addToLog('meal plan', 'insert', $mealPlan, null);

            if ($request->filled("menuItems")) {
                foreach ($request->menuItems as $menuTypeId => $menuItems) {
                    foreach ($menuItems as $menuItem) {
                        $mealPlan->menuItems()->create([
                            'meal_plan_id' => $mealPlan->id,
                            'menu_id' => $menuItem['id'],
                            'week' => $menuItem['week'],
                            'day' => $menuItem['day'],
                        ]);
                    }
                }
            }

            if ($customer->email) {
                try {
                    Log::info('Attempting to send email to: ' . $customer->email);
                    // Mail::to("devtms@ipscloud.co")->send(new OrderCreated($customer, $mealPlan));
                    Mail::to($customer->email)->send(new OrderCreated($customer, $mealPlan));
                    Log::info('Emails successfully sent');
                } catch (\Exception $e) {
                    Log::error('Email failed to send: ' . $e->getMessage());
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Meal plan created successfully!',
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Unable to create meal plan',
        ], 500);
    }

    public function orderDetails($order)
    {
        try {
            $orderId = decrypt($order);
            $mealPlan = MealPlan::with([
                'menuItems.menu' => function ($query) {
                    $query->select('id', 'name', 'description');
                }
            ])->findOrFail($orderId);

            return view('site.orders.details', compact('mealPlan'));
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {

            abort(404, 'Invalid order link');
        }
    }
}
