@extends('dashboard.layouts.app')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        gap: 5px;
    }

    .pagination .page-item {
        list-style: none;
    }

    .pagination .page-link {
        color: #007bff;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        padding: 8px 16px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background-color: #007bff;
        color: #fff;
    }

    .pagination .active .page-link {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .pagination .disabled .page-link {
        cursor: not-allowed;
        color: #6c757d;
    }
</style>

@section('content')
<div class="card shadow-sm mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title m-0">Activity Logs</h3>
        <a href="{{ route('activity-log.create') }}" class="btn btn-primary">Create Activity Log</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">Service</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activityLogs as $log)
                    <tr>
                        <td>{{ $log->user->name }}</td>
                        <td>{{ $log->service->name[app()->getLocale()] }}</td>
                        <td>{{ $log->name }}</td>
                        <td>{{ $log->description }}</td>
                        <td>
                            <a href="{{ route('activity-log.edit', $log->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <x-delete-button :id="$log->id" :url="route('activity-log.destroy', $log->id)" />
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No activity logs found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-3">
            {{ $activityLogs->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
