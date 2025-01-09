@extends('dashboard.layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Activity Log</h1>

    {{-- Form for editing an activity log --}}
    <form action="{{ route('admin.activity-logs.update', $activityLog->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- status Input --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" required>
                <option value="" disabled>Select a status</option>
                <option value="pending" {{ $activityLog->status =='pending' ? 'selected' : '' }}>pending</option>
                <option value="in-progress" {{ $activityLog->status == 'in-progress' ? 'selected' : '' }}>in-progress</option>
                <option value="completed" {{ $activityLog->status == 'completed' ? 'selected' : '' }}>completed</option>
            </select>
        </div>
        {{-- User Selection --}}
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select id="user_id" name="user_id" class="form-select" required>
                <option value="" disabled>Select a user</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $activityLog->user_id == $user->id ? 'selected' : '' }}>
                    User: {{ $user->name }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Server Selection --}}
        <div class="mb-3">
            <label for="server_id" class="form-label">Server</label>
            <select id="server_id" name="service_id" class="form-select" required>
                <option value="" disabled>Select a server</option>
                @foreach($services as $server)
                <option value="{{ $server->id }}" {{ $activityLog->service_id == $server->id ? 'selected' : '' }}>
                    Server: {{ $server->name['en'] }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- Action Input --}}
        <div class="mb-3">
            <label for="action" class="form-label">Action</label>
            <input type="text" id="action" name="name" class="form-control"
                value="{{ old('name', $activityLog->name) }}" placeholder="Enter action description" required>
        </div>

        {{-- Details Input --}}
        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea id="details" name="description" class="form-control" placeholder="Enter additional details"
                rows="4">{{ old('description', $activityLog->description) }}</textarea>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
