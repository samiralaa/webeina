@extends('dashboard.layouts.app')

@section('content')
    <div class="container my-5">
        <div id="serviceForm" class="section-form shadow p-4 rounded">
            <h2 class="h4 mb-4 text-primary">Service Section</h2>
            <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="service">
                <input type="hidden" name="status" value="0">


                <div id="slidersRepeater">
                    <div class="slider-item border p-3 mb-3 rounded shadow-sm">
                        <button type="button" class="btn-close float-end remove-slider" aria-label="Close"></button>

                        <!-- Slider Titles -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Slider Title (Arabic):</label>
                                <input type="text" name="sliders[0][title][ar]" class="form-control shadow-sm" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Slider Title (English):</label>
                                <input type="text" name="sliders[0][title][en]" class="form-control shadow-sm" required>
                            </div>
                        </div>

                        <!-- Slider Descriptions -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Slider Description (Arabic):</label>
                                <textarea name="sliders[0][description][ar]" class="form-control shadow-sm" rows="3" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Slider Description (English):</label>
                                <textarea name="sliders[0][description][en]" class="form-control shadow-sm" rows="3" required></textarea>
                            </div>
                        </div>

                        <!-- Slider Sub Title -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Slider Sub Title (Arabic):</label>
                                <input type="text" name="sliders[0][sub_title][ar]" class="form-control shadow-sm">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Slider Sub Title (English):</label>
                                <input type="text" name="sliders[0][sub_title][en]" class="form-control shadow-sm">
                            </div>
                        </div>

                        <!-- Slider Image -->
                        <div class="mb-3">
                            <label class="form-label">Slider Image:</label>
                            <input type="file" name="sliders[0][image]" class="form-control shadow-sm">
                        </div>

                        <!-- Slider Image Direction -->
                        <div class="mb-3">
                            <label class="form-label">Slider Image Direction:</label>
                            <select name="sliders[0][image_direction]" class="form-control shadow-sm">
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                            </select>
                        </div>

                        <!-- Slider Section ID -->


                        <!-- Slider Link -->
                        <div class="mb-3">
                            <label class="form-label">Slider Link:</label>
                            <input type="text" name="sliders[0][link]" class="form-control shadow-sm">
                        </div>
                    </div>
                </div>


                <!-- Add Slider Button -->
                <button type="button" id="addSlider" class="btn btn-secondary mt-3">Add Another Slider</button>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100 mt-4 py-2">Create Service</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.getElementById('addSlider').addEventListener('click', function() {
            const slidersRepeater = document.getElementById('slidersRepeater');
            const sliderItems = slidersRepeater.getElementsByClassName('slider-item');
            const index = sliderItems.length; // Get the current number of sliders

            // Create a new slider item dynamically
            const newSliderItem = document.createElement('div');
            newSliderItem.classList.add('slider-item', 'border', 'p-3', 'mb-4', 'rounded', 'shadow-sm',
                'position-relative');
            newSliderItem.innerHTML = `
        <button type="button" class="btn-close position-absolute top-0 end-0 remove-slider" aria-label="Close"></button>

        <!-- Slider Titles -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Slider Title (Arabic):</label>
                <input type="text" name="sliders[${index}][title][ar]" class="form-control shadow-sm" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Slider Title (English):</label>
                <input type="text" name="sliders[${index}][title][en]" class="form-control shadow-sm" required>
            </div>
        </div>
  <!-- Slider subtitle -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Slider Sub Title (Arabic):</label>
                <input type="text" name="sliders[${index}][sub_title][ar]" class="form-control shadow-sm">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Slider Sub Title (English):</label>
                <input type="text" name="sliders[${index}][sub_title][en]" class="form-control shadow-sm">
                </div>
            </div>
        <!-- Slider Descriptions -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Slider Description (Arabic):</label>
                <textarea name="sliders[${index}][description][ar]" class="form-control shadow-sm" rows="3" required></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Slider Description (English):</label>
                <textarea name="sliders[${index}][description][en]" class="form-control shadow-sm" rows="3" required></textarea>
            </div>
        </div>

        <!-- Slider Image -->
        <div class="mb-3">
            <label class="form-label">Slider Image:</label>
            <input type="file" name="sliders[${index}][image]" class="form-control shadow-sm">
        </div>

        <!-- Slider Image Directory -->
        <div class="mb-3">
            <label class="form-label">Slider Image Directory:</label>
            <select name="sliders[${index}][image_direction]" class="form-select shadow-sm">
                <option value="left">Left</option>
                <option value="right">Right</option>
            </select>
        </div>

        <!-- Slider Link -->
        <div class="mb-3">
            <label class="form-label">Slider Link:</label>
            <input type="text" name="sliders[${index}][link]" class="form-control shadow-sm">
        </div>
        `;

            // Append the new slider item
            slidersRepeater.appendChild(newSliderItem);

            // Attach event listener to the remove button of the new slider
            newSliderItem.querySelector('.remove-slider').addEventListener('click', function() {
                this.closest('.slider-item').remove();
            });
        });

        // Attach remove functionality for the initial slider
        document.querySelectorAll('.remove-slider').forEach(function(btn) {
            btn.addEventListener('click', function() {
                this.closest('.slider-item').remove();
            });
        });
    </script>
@endsection
