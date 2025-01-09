@extends('dashboard.layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Create Activity Log</h1>

    {{-- Form for creating an activity log --}}
    <form action="{{ route('admin.activity-logs.store') }}" method="POST">
        @csrf

        {{-- User Selection --}}
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select id="user_id" name="user_id" class="form-select" required>
                <option value="" disabled selected>Select a user</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">User: {{ $user->name }} </option>
                @endforeach
            </select>
        </div>

        {{-- server Selection --}}
        <div class="mb-3">
            <label for="server_id" class="form-label">Server</label>
            <select id="server_id" name="service_id" class="form-select" required>
                <option value="" disabled selected>Select a server</option>
                @foreach($services as $server)
                <option value="{{ $server->id }}">Server: {{ $server->name['en'] }}</option>
                @endforeach
            </select>
        </div>

        {{-- Action Input --}}
        <div class="mb-3">
            <label for="action" class="form-label">Action</label>
            <input type="text" id="action" name="name" class="form-control" placeholder="Enter action description"
                required>
        </div>

        {{-- Details Input --}}
        <div class="mb-3">
            <label for="details" class="form-label">Details</label>
            <textarea id="details" name="description" class="form-control" placeholder="Enter additional details"
                rows="4"></textarea>
        </div>

        {{-- Submit Button --}}
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
