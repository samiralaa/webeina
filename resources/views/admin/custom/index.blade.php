@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <h2>Attributes List</h2>

        <a href="{{ route('attributes.create') }}" class="btn btn-success mb-3">Create New Attribute</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Key (Languages)</th>
                    <th>Attributable Type</th>
                    <th>Field Type</th>
                    <th>Required</th>
                    <th>Show in Table</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attributes as $attribute)
                    <tr>
                        <td>
                            <strong>EN:</strong> {{ json_decode($attribute->key)->en }} <br>
                            <strong>AR:</strong> {{ json_decode($attribute->key)->ar }}
                        </td>
                        <td>{{ $attribute->attributable_type }}</td>
                        <td>{{ ucfirst($attribute->field_type) }}</td>
                        <td>{{ $attribute->is_required ? 'Yes' : 'No' }}</td>
                        <td>{{ $attribute->show_in_table ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('custom.edit', $attribute->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('custom.show', $attribute->attributable_type) }}" class="btn btn-info btn-sm">Show</a>

                            <!-- Delete Button -->
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $attribute->id }}">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal-{{ $attribute->id }}" tabindex="-1"
                                 aria-labelledby="deleteModalLabel-{{ $attribute->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $attribute->id }}">
                                                Confirm Deletion
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this attribute? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('custom.delete', $attribute->id) }}" method="POST"
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Confirm Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        {{-- {{ $attributes->links() }} --}}
    </div>
@endsection
