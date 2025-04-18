@extends('layouts.admin')
@section('title', isset($customer) ? 'Edit Customer' : 'Create Customer')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @php
                $action = isset($customer)
                    ? route('admin.customers.update', $customer)
                    : route('admin.customers.store');
                $method = isset($customer) ? 'PUT' : 'POST';
            @endphp

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ isset($customer) ? 'Edit' : 'Create' }} Customer</h1>
                <a href="{{ route('admin.customers.index') }}" class="btn btn-primary">Back</a>
            </div>

          <form class="standart-form" action="{{ $action }}" method="POST">
                @csrf
                @if (isset($customer))
                    @method('PUT')
                @endif
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $customer->name ?? '' }}" placeholder="User name...">
                                    <span data-field="name" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ $customer->email ?? '' }}" placeholder="User email...">
                                    <span data-field="email" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" class="form-control" name="company"
                                        value="{{ $customer->company ?? '' }}" placeholder="User company...">
                                    <span data-field="company" class="invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ $customer->phone ?? '' }}" placeholder="User phone...">
                                    <span data-field="phone" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="address">Adress</label>
                                    <textarea id="address" class="form-control" name="address" rows="6">{{ old('address', $customer->address ?? '') }}</textarea>
                                    <span data-field="address" class="invalid-feedback"></span>
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
