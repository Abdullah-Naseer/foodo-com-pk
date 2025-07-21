@extends('layouts.admin')
@section('title', 'History')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <!-- Filters Section -->
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="h3 mb-3"><strong>Filters</strong></h1>

                <form method="GET" action="{{ route('admin.history') }}" class="row g-3">
                    <!-- Date From -->
                    <div class="col-md-3">
                        <label for="date_from" class="form-label">From Date</label>
                        <input type="date" id="date_from" name="date_from" class="form-control"
                            value="{{ request('date_from') }}">
                    </div>

                    <!-- Date To -->
                    <div class="col-md-3">
                        <label for="date_to" class="form-label">To Date</label>
                        <input type="date" id="date_to" name="date_to" class="form-control"
                            value="{{ request('date_to') }}">
                    </div>

                    <!-- User -->
                    <div class="col-md-3">
                        <label for="user" class="form-label">User</label>
                        <select name="user" id="user" class="form-control select2">
                            <option value="">All Users</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ request('user') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit & Reset Buttons -->
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2 w-100">Filter</button>
                        <a href="{{ route('admin.history') }}" class="btn btn-secondary w-100">Reset</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- History Section -->
        <div class="card">
            <div class="card-body">
                <h1 class="h3 mb-3"><strong>History</strong></h1>
                <table class="table table-bordered table-striped text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Entity</th>
                            <th>Action</th>
                            <th>Changes</th>
                            <th>Changed By</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($history as $entry)
                            <tr>
                                <td>{{ ucfirst($entry->entity) }}</td>
                                <td>
                                    @if ($entry->action == 'update')
                                        <span class="badge bg-warning text-dark">Updated</span>
                                    @elseif($entry->action == 'insert')
                                        <span class="badge bg-success">Inserted</span>
                                    @else
                                        <span class="badge bg-danger">Restore</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($entry->changes)
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="collapse"
                                            data-bs-target="#changes{{ $entry->id }}">
                                            View Changes
                                        </button>
                                        <div id="changes{{ $entry->id }}" class="collapse mt-2">
                                            <div class="card card-body">
                                                <ul class="list-unstyled mb-0">
                                                    @foreach (json_decode($entry->changes, true) as $key => $change)
                                                        <li>
                                                            <strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong><br>
                                                            <span class="text-muted fw-bold">Old:
                                                                {{ is_array($change['old']) ? implode(',', $change['old']) : $change['old'] }}</span><br>
                                                            <span class="text-success">New:
                                                                {{ is_array($change['new']) ? implode(',', $change['new']) : $change['new'] }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-muted">No changes recorded</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $entry->user->name ?? 'Default Customer' }}
                                </td>
                                <td>{{ $entry->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">History not found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $history->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
