@extends('layouts.admin')
@section('title', isset($budget) ? 'Edit Budget' : 'Create Budget')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ isset($budget) ? 'Edit' : 'Create' }} Budget</h1>
                <a href="{{ route('admin.budget.index') }}" class="btn btn-primary">Back</a>
            </div>

          <form class="standart-form" action="{{ route('admin.budget.store')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $budget->id ?? '' }}">
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <select class="form-control select2" name="customer_id" id="customer_id">
                                        <option value="">Select Client</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ (isset($budget->customer_id) && $budget->customer_id == $customer->id) ? 'selected' : '' }}>
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-field="customer_id" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label>Package Name</label>
                                    <select class="form-control select2" name="menu_type_id" id="menu_type_id">
                                        <option value="">Select Package</option>
                                        @foreach ($menus as $menu)
                                            <option value="{{ $menu->id }}" {{ (isset($budget->menu_type_id) && $budget->menu_type_id == $menu->id) ? 'selected' : '' }}>
                                                {{ $menu->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-field="menu_type_id" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <div class="form-group">
                                    <label>Amount Received (PKR)</label>
                                    <input type="number" min="1" max="100000" class="form-control" name="amount_received"
                                        value="{{ $budget->amount_received ?? '' }}" placeholder="Amount Received...">
                                    <span data-field="amount_received" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <div class="form-group">
                                    <label>Monthly Expense (PKR)</label>
                                    <input type="number" min="1" class="form-control" name="monthly_expense"
                                        value="{{ $budget->monthly_expense ?? '' }}" placeholder="Monthly Expense...">
                                    <span data-field="monthly_expense" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <div class="form-group">
                                    <label for="month">Month</label>
                                    <select class="form-control" name="month" id="month">
                                        <option value="">Select Month</option>
                                        @foreach ($months as $m)
                                            <option value="{{ $m }}" {{ (isset($budget->month) && $budget->month == $m) ? 'selected' : '' }}>
                                                {{ $m }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-field="month" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="notes">Note</label>
                                    <textarea id="notes" class="form-control" name="notes" rows="6">{{ old('notes', $budget->notes ?? '') }}</textarea>
                                    <span data-field="notes" class="invalid-feedback"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="row">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
