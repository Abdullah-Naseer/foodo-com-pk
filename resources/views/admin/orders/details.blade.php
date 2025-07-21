@extends('layouts.admin')
@section('title', 'Order Details')

@section('content')
    <main class="content">
        <div class="container-fluid">
            <!-- Meal Plan Overview -->
            <div class="card shadow">
                <div class="card-header mb-0">
                    <h4 class="mb-0">Meal Plan Overview</h4>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <div class="mb-2"><strong>Meal Plan ID:</strong> {{ $mealPlan->id }}</div>
                            <div class="mb-2"><strong>Customer Name:</strong> {{ $mealPlan->customer->name }}</div>
                            <div class="mb-2"><strong>Company:</strong> {{ $mealPlan->company }}</div>
                            <div><strong>Phone:</strong> {{ $mealPlan->phone }}</div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-2"><strong>Delivery Address:</strong> {{ $mealPlan->delivery_address }}</div>
                            <div class="mb-2"><strong>Number of Persons:</strong> {{ $mealPlan->persons }}</div>
                            <div class="mb-2"><strong>Start Date:</strong> {{ $mealPlan->start_date }}</div>
                            <div>
                                <strong>Status:</strong>
                                <span class="badge bg-primary">
                                    {{ ucfirst($mealPlan->status) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0">Meal Plan Menu Details</h5>
                </div>
                <div class="card-body">
                    @if ($mealPlan->menuItems->isEmpty())
                        <div class="alert alert-warning text-center" role="alert">
                            No menu items available for this meal plan.
                        </div>
                    @else
                        <div class="table-responsive">
                            @php
                                $groupedMenuItems = $mealPlan->menuItems->groupBy('week');
                            @endphp

                            @foreach ($groupedMenuItems as $week => $items)
                                <h6 class="text-primary mb-3">Week {{ $week }}</h6>
                                <table class="table table-bordered table-hover mb-4">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Day</th>
                                            <th>Menu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $menuItem)
                                            <tr>
                                                <td>{{ $menuItem->day }}</td>
                                                <td>{{ $menuItem->menu->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
