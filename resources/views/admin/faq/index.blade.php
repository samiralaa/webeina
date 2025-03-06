@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Frequently Asked Questions</h1>

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- Flash Messages --}}

    {{-- Add FAQ Route --}}
    <a href="{{ route('faq.create') }}" class="btn btn-primary mb-3">Add FAQ</a>

    <div class="accordion" id="faqAccordion">
        @foreach ($faqs as $faq)
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $faq['id'] }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse{{ $faq['id'] }}" aria-expanded="false"
                    aria-controls="collapse{{ $faq['id'] }}">
                    {{ json_decode($faq->question, true)['en'] }}
                </button>
            </h2>
            <div id="collapse{{ $faq['id'] }}" class="accordion-collapse collapse"
                aria-labelledby="heading{{ $faq['id'] }}" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    {{ json_decode($faq->answer, true)['en'] }}

                    {{-- Delete Button with Modal Trigger --}}
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#deleteModal-{{ $faq->id }}">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>

        {{-- Delete Confirmation Modal --}}
        <div class="modal fade" id="deleteModal-{{ $faq->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $faq->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel-{{ $faq->id }}">Confirm Delete</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this FAQ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Delete Confirmation Modal --}}

        @endforeach
    </div>
</div>
@endsection
