@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Services</h1>
            <a href="{{ route('services.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Add New Service
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td>{{ $service->name['en'] }}</td>
                            <td class="text-center">
                                <a href="{{ route('services.show', $service->id) }}" class="btn btn-info btn-sm me-2">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm me-2">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <!-- Delete Form -->
                                <form id="delete-form-{{ $service->id }}"
                                    action="{{ route('services.destroy', $service->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-{{ $service->id }}">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal-{{ $service->id }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel-{{ $service->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel-{{ $service->id }}">Confirm
                                                    Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this service? This action cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger"
                                                    onclick="document.getElementById('delete-form-{{ $service->id }}').submit();">
                                                    Confirm Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
