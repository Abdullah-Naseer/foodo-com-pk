@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <main class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-calendar-check fa-3x text-warning"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-muted">Total Menu Types</h5>
                                <h2 class="fw-bold">{{ $totalMenuTypes ?? 0 }}</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-body d-flex align-items-center">
                            <div class="me-3">
                                <i class="fas fa-users fa-3x text-success"></i>
                            </div>
                            <div>
                                <h5 class="card-title text-muted">Total Customers</h5>
                                <h2 class="fw-bold">{{ $totalCustomers ?? 0 }}</h2>
                            </div>
                        </div>
                    </div>
                </div>


            <div class="col-md-4">
                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-body d-flex align-items-center">
                        <div class="me-3">
                            <i class="fas fa-utensils fa-3x text-danger"></i>
                        </div>
                        <div>
                            <h5 class="card-title text-muted">Total Orders</h5>
                            <h2 class="fw-bold">{{ $totalOrders ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Recent Orders -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-header bg-white fw-bold">Recent Orders</div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Menu Type</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @forelse ($recentOrders ?? [] as $order)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $order->menuType->type }}
                                                {{ count($order->menuItems) > 0 ? '(Custom)' : '' }}</td>
                                            <td>{{ $order->customer->name }}</td>
                                            <td>{{ $order->customer->phone }}</td>
                                            <td>
                                                <span
                                                    class="badge
                                                    {{ $order->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $order->created_at->format('d M Y h:i A') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No recent orders available.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
