@extends('dashboard.layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Create Attribute</h2>

        <form action="{{ route('attributes.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="key" class="form-label">Key (in different languages)</label>
                    <div class="input-group">
                        <input type="text" name="key[en]" class="form-control" placeholder="English Key" required>
                        <input type="text" name="key[ar]" class="form-control" placeholder="Arabic Key" required>
                    </div>
                    @error('key')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="attributable_type" class="form-label">Attributable Type</label>
                    <select name="attributable_type" class="form-control" required>
                        <option value="" disabled selected>Select Model</option>
                        @foreach ($models as $model)
                            <option value="{{ $model }}">{{ class_basename($model) }}</option>
                        @endforeach
                    </select>
                    @error('attributable_type')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="field_type" class="form-label">Field Type</label>
                    <select name="field_type" id="field_type" class="form-select" required>
                        <option value="text">Text</option>
                        <option value="number">Number</option>
                        <option value="textarea">Textarea</option>
                        <option value="select">Select</option>
                    </select>
                    @error('field_type')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3" id="options-container" style="display: none;">
                <div class="col-md-6">
                    <label for="options" class="form-label">Options (Multiple Values)</label>
                    <div id="options-fields">
                        <div class="option-input mb-2">
                            <input type="text" name="options[0][en]" class="form-control" placeholder="English Option">
                            <input type="text" name="options[0][ar]" class="form-control" placeholder="Arabic Option">
                        </div>
                    </div>
                    <button type="button" id="add-option" class="btn btn-outline-secondary">Add Option</button>
                    @error('options')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="is_required" class="form-label">Is Required</label>
                    <select name="is_required" class="form-select" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    @error('is_required')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="show_in_table" class="form-label">Show in Table</label>
                    <select name="show_in_table" class="form-select" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    @error('show_in_table')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create Attribute</button>
        </form>
    </div>

    <script>
        // Function to toggle the visibility of the options container
        function toggleOptionsField() {
            var fieldType = document.getElementById('field_type').value;
            var optionsContainer = document.getElementById('options-container');

            if (fieldType === 'select') {
                optionsContainer.style.display = 'block'; // Show options field
            } else {
                optionsContainer.style.display = 'none'; // Hide options field
            }
        }

        // Add event listener for change in field_type dropdown
        document.getElementById('field_type').addEventListener('change', toggleOptionsField);

        // Trigger the toggle function on page load to ensure correct initial state
        window.addEventListener('DOMContentLoaded',
        toggleOptionsField); // Ensure the function runs after the DOM is fully loaded

        // Add new option input fields dynamically
        document.getElementById('add-option').addEventListener('click', function() {
            var optionsContainer = document.getElementById('options-fields');
            var newOptionIndex = optionsContainer.children.length;
            var newOptionField = `
                <div class="option-input mb-2">
                    <input type="text" name="options[${newOptionIndex}][en]" class="form-control" placeholder="English Option">
                    <input type="text" name="options[${newOptionIndex}][ar]" class="form-control" placeholder="Arabic Option">
                </div>
            `;
            optionsContainer.insertAdjacentHTML('beforeend', newOptionField);
        });
    </script>
@endsection
