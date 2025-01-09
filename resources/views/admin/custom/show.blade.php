@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <h2>Create Attribute Form</h2>

    <form action="{{ route('custom.data.store') }}" method="POST">
        @csrf

        @foreach ($attributes as $attribute)
        <div class="mb-3">
            <label for="attribute_{{ $attribute->id }}" class="form-label">
                {{ json_decode($attribute->key)->en }} ({{ json_decode($attribute->key)->ar }})
            </label>

            @switch($attribute->field_type)
            @case('select')
            <select class="form-control" name="{{ json_decode($attribute->key)->en }}"
                id="attribute_{{ $attribute->id }}">
                <option value='{"custom_fild_id": "{{ $attribute->id }}", "custom_fild_value": "custom_fild_value"}'>
                    Select an option</option>
                @foreach (json_decode($attribute->options) as $option)
                <option value='{"custom_fild_id": "{{ $attribute->id }}", "custom_fild_value": "{{ $option->en }}"}'>{{
                    $option->en }}</option>
                @endforeach
            </select>
            @break

            @case('textarea')
            <textarea class="form-control" name="{{ json_decode($attribute->key)->en }}"
                id="attribute_{{ $attribute->id }}" rows="3"></textarea>
            @break

            @case('text')
            <!-- Hidden input to send custom_fild_id -->
            <input type="hidden" name="custom_fild_id" value="{{ $attribute->id }}">

            <!-- Text input to send the custom_fild_value dynamically -->
            <input type="text" class="form-control" name="custom_fild_value"
                   id="attribute_{{ $attribute->id }}">
            @break

            @default
            <input type="text" class="form-control" name="{{ json_decode($attribute->key)->en }}"
                id="attribute_{{ $attribute->id }}">
            @break
            @endswitch

            <!-- Display validation errors for this specific field -->
            @error(json_decode($attribute->key)->en)
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
