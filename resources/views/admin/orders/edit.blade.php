@extends('layouts.admin')
@section('title', 'Order Edit #' . $mealPlan->id)

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">Edit Order # {{ $mealPlan->id }}</h1>
                <a href="{{ route('admin.orders') }}" class="btn btn-primary">Back</a>
            </div>

            <form class="standart-form" action="{{ route('admin.orders.update', $mealPlan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <!-- Name -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ $mealPlan->customer->name }}" disabled>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="type">Menu Type</label>
                                    <input type="text" id="type" class="form-control" name="type"
                                        value="{{ $mealPlan->menuType->type }}" disabled>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="persons">Persons</label>
                                    <input type="text" id="persons" class="form-control" name="persons"
                                        value="{{ $mealPlan->persons }}" placeholder="persons...">
                                    <span data-field="persons" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="date" class="form-control" name="phone"
                                        value="{{ $mealPlan->phone }}" placeholder="phone...">
                                    <span data-field="phone" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" id="date" class="form-control" name="company"
                                        value="{{ $mealPlan->company }}" placeholder="company...">
                                    <span data-field="company" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="start_date">Expected Start Date</label>
                                    <input type="date" id="date" class="form-control" name="start_date"
                                        value="{{ $mealPlan->start_date }}" placeholder="Select start date...">
                                    <span data-field="start_date" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="delivery_address">Delivery Address</label>
                                    <textarea id="delivery_address" class="form-control" name="delivery_address" rows="6">{{ $mealPlan->delivery_address }}</textarea>
                                    <span data-field="delivery_address" class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
