@extends('dashboard.layouts.app')
@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Contact Messages</h4>
        </div>
        <div class="card-body">
            @if($contacts->isEmpty())
            <div class="alert alert-info text-center">
                No contacts available.
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company</th>
<th> serves</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $index => $contact)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $contact->name }}</td>

                            <td>{{ $contact->email ?? $contact->business_email}}</td>
                            <td>{{ $contact->company }}</td>
                            <!-- test -->
                            <td>{{$contact->service->name['en'] ?? "test"}} </td>
                            <td>{{ Str::limit($contact->message, 50) }}</td>
                            <td>
                                <a href="{{ route('admin.contact.show', $contact->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this contact?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
