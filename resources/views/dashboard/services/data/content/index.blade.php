@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <h1>Service: {{ isset($service->name['en']) ? $service->name['en'] : 'N/A' }}</h1>

        <h2>Contents</h2>
        @if($service->contents->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Sub Title</th>
                        <th>Questions</th>
                        <th>Type</th>
                        <th>Order</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Actions</th> <!-- New Column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($service->contents as $content)
                        <tr>
                            <td>{{ $content->id }}</td>
                            <td>{{ isset($content->title['en']) ? $content->title['en'] : 'N/A' }}</td>
                            <td>{{ isset($content->description['en']) ? $content->description['en'] : 'N/A' }}</td>
                            <td>{{ isset($content->sub_title['en']) ? $content->sub_title['en'] : 'N/A' }}</td>
                            <td>
                                @if(isset($content->questions) && is_array($content->questions))
                                    {{ implode(', ', $content->questions) }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $content->type ?? 'N/A' }}</td>
                            <td>{{ $content->order ?? 'N/A' }}</td>
                            <td>
                                @if($content->link)
                                    <a href="{{ $content->link }}" target="_blank">View</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if(isset($content->status) && is_array($content->status))
                                    {{ implode(', ', $content->status) }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if($content->image)
                                    <img src="{{ asset('storage/' . $content->image) }}" width="80">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $content->created_at->format('Y-m-d') }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('services.edit.content', $content->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <!-- Delete Button -->
                                <form action="{{ route('services.delete.content', $content->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No contents available for this service.</p>
        @endif
    </div>
@endsection
