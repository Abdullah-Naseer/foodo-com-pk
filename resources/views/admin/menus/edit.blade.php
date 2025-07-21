@extends('layouts.admin')
@section('title', isset($menu) ? 'Edit Menu' : 'Create Menu')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @php
                $action = isset($menu) ? route('admin.menus.update', $menu) : route('admin.menus.store');
                $method = isset($menu) ? 'PUT' : 'POST';
            @endphp

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3">{{ isset($menu) ? 'Edit' : 'Create' }} Menu</h1>
                <a href="{{ route('admin.menus.index') }}" class="btn btn-primary">Back</a>
            </div>

            <form class="standart-menu-form" action="{{ $action }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($menu))
                    @method('PUT')
                @endif

                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <!-- Name -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name', $menu->name ?? '') }}" placeholder="Name...">
                                    <span data-field="name" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- Menu Type -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="menu_type_id">Menu Type</label>
                                    <select id="menu_type_id" class="form-control {{ isset($menu) ? 'input-readonly' : '' }}" name="menu_type_id">
                                        <option value="">Select Type</option>
                                        @foreach ($menu_types as $menu_type)
                                            <option value="{{ $menu_type->id }}"
                                                {{ old('menu_type_id', $menu->menu_type_id ?? '') == $menu_type->id ? 'selected' : '' }}>
                                                {{ $menu_type->type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-field="menu_type_id" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- Week -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="week">Week</label>
                                    <select id="week" class="form-control {{ isset($menu) ? 'input-readonly' : '' }}" name="week">
                                        <option value="">Select Week</option>
                                        @foreach ($weeks as $week)
                                            <option value="{{ $week }}"
                                                {{ old('week', $menu->week ?? '') == $week ? 'selected' : '' }}>
                                                {{ $week }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-field="week" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- Day -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="day">Day</label>
                                    <select id="day" class="form-control {{ isset($menu) ? 'input-readonly' : '' }}" name="day">
                                        <option value="">Select Day</option>
                                        @foreach ($days as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('day', $menu->day ?? '') == $value ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span data-field="day" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- Price -->
                            <!--<div class="col-sm-6 mb-3">-->
                            <!--    <div class="form-group">-->
                            <!--        <label for="price">Price</label>-->
                            <!--        <input type="text" id="price" class="form-control" name="price"-->
                            <!--            value="{{ old('price', $menu->price ?? '') }}" placeholder="Price...">-->
                            <!--        <span data-field="price" class="invalid-feedback"></span>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <!-- Image -->
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" class="form-control" name="image">
                                    @if (isset($menu) && $menu->image)
                                        <img src="{{ asset($menu->image) }}" alt="Menu Image" class="img-fluid mt-2"
                                            style="max-width: 150px;">
                                    @endif
                                    <span data-field="image" class="invalid-feedback"></span>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" name="description" rows="6">{{ old('description', $menu->description ?? '') }}</textarea>
                                    <span data-field="description" class="invalid-feedback"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('public/admin/js/menu.js') }}"></script>
@endpush

