@extends('dashboard.layouts.app')
@section('title', 'Create Section')

@section('content')
    <main>
        <div class="container mt-5">
            <h1 class="text-center mb-5">Create Section</h1>

            <!-- Dropdown to select section type -->
            <div class="form-group mb-4">
                <label for="sectionType" class="h5">Select Section Type:</label>
                <select id="sectionType" class="form-select shadow-sm">
                    <option value="" selected disabled>Choose section type</option>
                    <option value="banner">Banner</option>
                    <option value="agency">About</option>
                    <option value="portfolio">Portfolio</option>
                    <option value="slider">Slider</option>
                    <option value="swiper">Swiper</option>
                    <option value="sponsor">Sponsor</option>
                    <option value="contact">contact</option>
                    <option value="blog">Blog</option>
                    <option value="service">service</option>
                </select>
            </div>

            <div id="sponsorForm" class="section-form">
                <h2 class="h4 mb-3 text-primary">sponsor Section</h2>
                <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="sponsor">
                    <input type="hidden" name="status" value="0">
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Agency Image</label>
                        <input type="file" name="images[]" id="image" class="form-control" multiple>
                        @error('images')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3 py-2">Create</button>
                </form>
            </div>

            <div id="swiperForm" class="section-form">
                <h2 class="h4 mb-3 text-primary">Swiper Section</h2>
                <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="swipers">
                    <input type="hidden" name="status" value="0">

                    <!-- Slider Names and Links -->
                    <div id="slider-fields">
                        <!-- Arabic Inputs -->
                        <h3>Arabic Sliders</h3>
                        <div class="slider-group">
                            <label for="slider_name_ar">Slider Name (Arabic):</label>
                            <input type="text" name="slider_name[ar][]" class="form-control mb-2"
                                placeholder="Enter Arabic name" required>
                            <label for="slider_link_ar">Slider Link (Arabic):</label>
                            <input type="url" name="slider_link[ar][]" class="form-control mb-3"
                                placeholder="Enter Arabic link">
                        </div>

                        <!-- English Inputs -->
                        <h3>English Sliders</h3>
                        <div class="slider-group">
                            <label for="slider_name_en">Slider Name (English):</label>
                            <input type="text" name="slider_name[en][]" class="form-control mb-2"
                                placeholder="Enter English name" required>
                            <label for="slider_link_en">Slider Link (English):</label>
                            <input type="url" name="slider_link[en][]" class="form-control mb-3"
                                placeholder="Enter English link">
                        </div>
                    </div>

                    <!-- Add New Slider Button -->
                    <button type="button" id="add-slider" class="btn btn-secondary">Add Another Slider</button>

                    <button type="submit" class="btn btn-primary w-100 mt-3 py-2">Create</button>
                </form>
            </div>

            <div id="formsContainer">


                {{-- add form to add contact section --}}
                <div id="contactForm" class="section-form">
                    <h2 class="h4 mb-3 text-primary">Contact Section</h2>
                    <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="contact">
                        <input type="hidden" name="status" value="0">

                        <!-- Contact Title (Arabic) -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="agencyNameAr" class="form-label">Agency Name (Arabic):</label>
                            <input type="text" name="title[ar]" id="agencyNameAr" class="form-control shadow-sm"
                                required>
                            @error('title.ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="agencyNameEn" class="form-label">Agency Name (English):</label>
                            <input type="text" name="title[en]" id="agencyNameEn" class="form-control shadow-sm"
                                required>
                            @error('title.en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description (Arabic)</label>
                            <textarea name="description[ar]" id="description" class="form-control" rows="3"></textarea>
                            @error('description.ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description_en" class="form-label">Description (English)</label>
                            <textarea name="description[en]" id="description_en" class="form-control" rows="3"></textarea>
                            @error('description.en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="link" class="form-label">Link:</label>
                            <input type="text" name="link" id="link" class="form-control shadow-sm" required>
                            @error('link')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="button_text_ar" class="form-label">Button Text (Arabic)</label>
                            <input type="text" name="button_text[ar]" id="button_text_ar" class="form-control">
                            @error('button_text.ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="button_text_en" class="form-label">Button Text (English)</label>
                            <input type="text" name="button_text[en]" id="button_text_en" class="form-control">
                            @error('button_text.en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Agency Image</label>
                            <input type="file" name="images[]" id="image" class="form-control" multiple>
                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 mt-3 py-2">Create Contact</button>
                    </form>
                </div>

                <div id="blogForm" class="section-form">
                    <h2 class="h4 mb-3 text-primary">Blog Section</h2>
                    <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="blog">
                        <input type="hidden" name="status" value="0">

                        <!-- Blog Titles -->


                        <!-- Blog Image -->
                      

                        <!-- Sliders Section -->
                        <div id="slidersRepeater">
                            <div class="slider-item border p-3 mb-3 rounded shadow-sm">
                                <!-- Slider Titles -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Slider Title (Arabic):</label>
                                        <input type="text" name="sliders[0][title][ar]" class="form-control shadow-sm"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Slider Title (English):</label>
                                        <input type="text" name="sliders[0][title][en]" class="form-control shadow-sm"
                                            required>
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

                                <!-- Slider Subtitles -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Slider Sub Title (Arabic):</label>
                                        <input type="text" name="sliders[0][sub_title][ar]"
                                            class="form-control shadow-sm">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Slider Sub Title (English):</label>
                                        <input type="text" name="sliders[0][sub_title][en]"
                                            class="form-control shadow-sm">
                                    </div>
                                </div>

                                <!-- Slider Image -->
                                <div class="mb-3">
                                    <label class="form-label">Slider Image:</label>
                                    <input type="file" name="sliders[0][image]" class="form-control shadow-sm">
                                </div>

                                <!-- Slider Link -->
                                <div class="mb-3">
                                    <label class="form-label">Slider Link:</label>
                                    <input type="text" name="sliders[0][link]" class="form-control shadow-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Add New Slider Button -->
                        <button type="button" id="addSlider" class="btn btn-secondary mt-3">Add Another Slider</button>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 mt-3 py-2">Create Blog</button>
                    </form>
                </div>



                <!-- JavaScript to Add Another Slider -->


                <!-- Banner Form -->
                <div id="bannerForm" class="section-form d-none bg-light p-4 rounded shadow-sm">
                    <h2 class="h4 mb-4 text-primary border-bottom pb-2">Banner Section</h2>
                    <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="banner">
                        <input type="hidden" name="status" value="0">

                        <div class="row">
                            <!-- Title (Arabic) -->
                            <div class="col-md-6 mb-3">
                                <label for="bannerTitleAr" class="form-label fw-bold">Title (Arabic):</label>
                                <input type="text" name="title[ar]" id="bannerTitleAr" class="form-control shadow-sm"
                                    required>
                                @error('title.ar')
                                    <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Title (English) -->
                            <div class="col-md-6 mb-3">
                                <label for="bannerTitleEn" class="form-label fw-bold">Title (English):</label>
                                <input type="text" name="title[en]" id="bannerTitleEn" class="form-control shadow-sm"
                                    required>
                                @error('title.en')
                                    <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Subtitle (Arabic) -->
                            <div class="col-md-6 mb-3">
                                <label for="subtitle" class="form-label fw-bold">Subtitle (Arabic):</label>
                                <input type="text" name="subtitle[ar]" id="subtitle" class="form-control shadow-sm">
                                @error('subtitle.ar')
                                    <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Subtitle (English) -->
                            <div class="col-md-6 mb-3">
                                <label for="subtitle_en" class="form-label fw-bold">Subtitle (English):</label>
                                <input type="text" name="subtitle[en]" id="subtitle_en"
                                    class="form-control shadow-sm">
                                @error('subtitle.en')
                                    <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <!-- Description (Arabic) -->
                            <label for="description" class="form-label fw-bold">Description (Arabic):</label>
                            <textarea name="description[ar]" id="description" class="form-control shadow-sm" rows="3"></textarea>
                            @error('description.ar')
                                <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <!-- Description (English) -->
                            <label for="description_en" class="form-label fw-bold">Description (English):</label>
                            <textarea name="description[en]" id="description_en" class="form-control shadow-sm" rows="3"></textarea>
                            @error('description.en')
                                <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- CTA Info -->
                        <div class="cta-section mb-4">
                            <h4 class="h6 text-secondary mb-3">CTA Information</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cta_name_ar" class="form-label fw-bold">CTA Name (Arabic):</label>
                                    <input type="text" name="info_name[ar][]" id="cta_name_ar"
                                        class="form-control shadow-sm">
                                    @error('info_name.ar')
                                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cta_name_en" class="form-label fw-bold">CTA Name (English):</label>
                                    <input type="text" name="info_name[en][]" id="cta_name_en"
                                        class="form-control shadow-sm">
                                    @error('info_name.en')
                                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cta_value_ar" class="form-label fw-bold">CTA Value (Arabic):</label>
                                    <input type="text" name="info_value[ar][]" id="cta_value_ar"
                                        class="form-control shadow-sm">
                                    @error('info_value.ar')
                                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cta_value_en" class="form-label fw-bold">CTA Value (English):</label>
                                    <input type="text" name="info_value[en][]" id="cta_value_en"
                                        class="form-control shadow-sm">
                                    @error('info_value.en')
                                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="cta-section mb-4">
                            <h4 class="h6 text-secondary mb-3">CTA Information</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cta_name_ar" class="form-label fw-bold">CTA Name (Arabic):</label>
                                    <input type="text" name="info_name[ar][]" id="cta_name_ar"
                                        class="form-control shadow-sm">
                                    @error('info_name.ar')
                                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cta_name_en" class="form-label fw-bold">CTA Name (English):</label>
                                    <input type="text" name="info_name[en][]" id="cta_name_en"
                                        class="form-control shadow-sm">
                                    @error('info_name.en')
                                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cta_value_ar" class="form-label fw-bold">CTA Value (Arabic):</label>
                                    <input type="text" name="info_value[ar][]" id="cta_value_ar"
                                        class="form-control shadow-sm">
                                    @error('info_value.ar')
                                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cta_value_en" class="form-label fw-bold">CTA Value (English):</label>
                                    <input type="text" name="info_value[en][]" id="cta_value_en"
                                        class="form-control shadow-sm">
                                    @error('info_value.en')
                                        <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">Banner Image:</label>
                            <input type="file" name="images[]" id="image" class="form-control shadow-sm">
                            @error('images')
                                <div class="alert alert-danger mt-1 p-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 py-2">Create Banner</button>
                    </form>
                </div>

                <!-- Agency Form -->
                <div id="agencyForm" class="section-form d-none">
                    <h2 class="h4 mb-3 text-primary">Agency Section</h2>
                    <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="agency">
                        <input type="hidden" name="status" value="0">

                        <!-- عرض الأخطاء العامة -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="agencyNameAr" class="form-label">Agency Name (Arabic):</label>
                            <input type="text" name="title[ar]" id="agencyNameAr" class="form-control shadow-sm"
                                required>
                            @error('title.ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="agencyNameEn" class="form-label">Agency Name (English):</label>
                            <input type="text" name="title[en]" id="agencyNameEn" class="form-control shadow-sm"
                                required>
                            @error('title.en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description (Arabic)</label>
                            <textarea name="description[ar]" id="description" class="form-control" rows="3"></textarea>
                            @error('description.ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description_en" class="form-label">Description (English)</label>
                            <textarea name="description[en]" id="description_en" class="form-control" rows="3"></textarea>
                            @error('description.en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="link" class="form-label">Link:</label>
                            <input type="text" name="link" id="link" class="form-control shadow-sm" required>
                            @error('link')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="button_text_ar" class="form-label">Button Text (Arabic)</label>
                            <input type="text" name="button_text[ar]" id="button_text_ar" class="form-control">
                            @error('button_text.ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="button_text_en" class="form-label">Button Text (English)</label>
                            <input type="text" name="button_text[en]" id="button_text_en" class="form-control">
                            @error('button_text.en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Agency Image</label>
                            <input type="file" name="images[]" id="image" class="form-control" multiple>
                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-3 py-2">Create Agency</button>
                    </form>
                </div>


                <div id="portfolioForm" class="section-form d-none">
                    <h2 class="h4 mb-3 text-primary">Portfolio Section</h2>

                    <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="protfolioImage">
                        <input type="hidden" name="status" value="0">
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Agency Image</label>
                            <input type="file" name="images[]" id="image" class="form-control" multiple>
                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3 py-2">Create</button>
                    </form>
                </div>


                <!-- Portfolio Form -->
                {{-- <div id="portfolioForm" class="section-form d-none">
                    <h2 class="h4 mb-3 text-primary">Portfolio Section</h2>
                    <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="portfolio">
                        <input type="hidden" name="status" value="0">


                        <!-- Title (Arabic) -->
                        <div class="mb-3">
                            <label for="portfolioTitleAr" class="form-label">Title (Arabic):</label>
                            <input type="text" name="title[ar]" id="portfolioTitleAr" class="form-control shadow-sm"
                                required>
                            @error('title.ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Title (English) -->
                        <div class="mb-3">
                            <label for="bannerTitleEn" class="form-label">Title (English):</label>
                            <input type="text" name="title[en]" id="bannerTitleEn" class="form-control shadow-sm"
                                required>
                            @error('title.en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Subtitle (Arabic) -->
                        <div class="form-group mb-3">
                            <label for="subtitle" class="form-label">Subtitle (Arabic)</label>
                            <input type="text" name="subtitle[ar]" id="subtitle" class="form-control">
                            @error('subtitle.ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Subtitle (English) -->
                        <div class="form-group mb-3">
                            <label for="subtitle_en" class="form-label">Subtitle (English)</label>
                            <input type="text" name="subtitle[en]" id="subtitle_en" class="form-control">
                            @error('subtitle.en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description (Arabic) -->
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description (Arabic)</label>
                            <textarea name="description[ar]" id="description" class="form-control" rows="3"></textarea>
                            @error('description.ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description (English) -->
                        <div class="form-group mb-3">
                            <label for="description_en" class="form-label">Description (English)</label>
                            <textarea name="description[en]" id="description_en" class="form-control" rows="3"></textarea>
                            @error('description.en')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- CTA Info -->
                        <div class="cta-section">
                            <div class="form-group mb-3">
                                <label for="cta_name_ar" class="form-label">CTA Info Name (Arabic)</label>
                                <input type="text" name="info_name[ar][]" id="cta_name_ar" class="form-control">
                                @error('info_name.ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="cta_name_en" class="form-label">CTA Info Name (English)</label>
                                <input type="text" name="info_name[en][]" id="cta_name_en" class="form-control">
                                @error('info_name.en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="cta_value_ar" class="form-label">CTA Info Value (Arabic)</label>
                                <input type="text" name="info_value[ar][]" id="cta_value_ar" class="form-control">
                                @error('info_value.ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="cta_value_en" class="form-label">CTA Info Value (English)</label>
                                <input type="text" name="info_value[en][]" id="cta_value_en" class="form-control">
                                @error('info_value.en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Banner Image</label>
                            <input type="file" name="images[]" id="image" class="form-control">
                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-3 py-2">Create Banner</button>
                    </form>
                </div> --}}

                <!-- Slider Form -->
                <div id="sliderForm" class="section-form d-none">
                    <h2 class="h4 mb-3 text-primary">Slider Section</h2>
                    <form action="{{ route('add.content') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type" value="slider">
                        <input type="hidden" name="status" value="0">
                        <!-- Sliders Container -->
                        <div id="sliders-container">
                            <!-- Single Slider Entry -->
                            <div class="slider-entry border p-3 mb-3 shadow-sm">
                                <h4>Slider #<span class="slider-number">1</span></h4>

                                <!-- Title -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title (Arabic)</label>
                                        <input type="text" name="sliders[0][title][ar]" class="form-control shadow-sm"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title (English)</label>
                                        <input type="text" name="sliders[0][title][en]" class="form-control shadow-sm"
                                            required>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Description (Arabic)</label>
                                        <textarea name="sliders[0][description][ar]" class="form-control shadow-sm" rows="3" required></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Description (English)</label>
                                        <textarea name="sliders[0][description][en]" class="form-control shadow-sm" rows="3" required></textarea>
                                    </div>
                                </div>

                                <!-- Sub Title -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Sub Title (Arabic)</label>
                                        <input type="text" name="sliders[0][sub_title][ar]"
                                            class="form-control shadow-sm">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Sub Title (English)</label>
                                        <input type="text" name="sliders[0][sub_title][en]"
                                            class="form-control shadow-sm">
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="sliders[0][image]" class="form-control shadow-sm">
                                </div>

                                <!-- Link -->
                                <div class="mb-3">
                                    <label class="form-label">Link</label>
                                    <input type="text" name="sliders[0][link]" class="form-control shadow-sm">
                                </div>

                                <!-- Section ID -->

                            </div>
                        </div>

                        <!-- Buttons -->
                        <button type="button" class="btn btn-secondary mb-3" id="addSliderBtn">Add Another
                            Slider</button>
                        <button type="submit" class="btn btn-primary w-100 py-2">Create Slider</button>
                    </form>
                </div>

            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle Section Type Change
            const sectionTypeElement = document.getElementById('sectionType');


            if (sectionTypeElement) {
                sectionTypeElement.addEventListener('change', function() {
                    const selectedType = this.value;
                    const forms = document.querySelectorAll('.section-form');
                    forms.forEach(function(form) {
                        form.classList.add('d-none');
                    });

                    if (selectedType) {
                        const selectedForm = document.getElementById(selectedType + 'Form');
                        if (selectedForm) {
                            selectedForm.classList.remove('d-none');
                        }
                    }
                });
            }


            if (sectionTypeElement) {
                sectionTypeElement.addEventListener('change', function() {
                    const selectedType = this.value;

                    // Check if the selected value is 'service'
                    if (selectedType === 'service') {
                        // Redirect to the desired route for the "service" section type
                        window.location.href = "{{ route('serves.create.section') }}";
                    }
                });
            }

            // Add Slider (Basic)
            const addSliderBtn = document.getElementById('addSliderBtn');
            if (addSliderBtn) {
                addSliderBtn.addEventListener('click', function() {
                    const sliderCount = document.querySelectorAll('.slider-entry').length;
                    const newSlider = document.createElement('div');
                    newSlider.classList.add('slider-entry', 'border', 'p-3', 'mb-3', 'shadow-sm');
                    newSlider.innerHTML = `
                        <h4>Slider #${sliderCount + 1}</h4>
                        <div class="mb-3"><label class="form-label">Title (Arabic)</label><input type="text" name="sliders[${sliderCount}][title][ar]" class="form-control shadow-sm" required></div>
                        <div class="mb-3"><label class="form-label">Title (English)</label><input type="text" name="sliders[${sliderCount}][title][en]" class="form-control shadow-sm" required></div>
                        <div class="mb-3"><label class="form-label">Description (Arabic)</label><textarea name="sliders[${sliderCount}][description][ar]" class="form-control shadow-sm" rows="3" required></textarea></div>
                        <div class="mb-3"><label class="form-label">Description (English)</label><textarea name="sliders[${sliderCount}][description][en]" class="form-control shadow-sm" rows="3" required></textarea></div>
                        <div class="mb-3"><label class="form-label">Sub Title (Arabic)</label><input type="text" name="sliders[${sliderCount}][sub_title][ar]" class="form-control shadow-sm"></div>
                        <div class="mb-3"><label class="form-label">Sub Title (English)</label><input type="text" name="sliders[${sliderCount}][sub_title][en]" class="form-control shadow-sm"></div>
                        <div class="mb-3"><label class="form-label">Image</label><input type="file" name="sliders[${sliderCount}][image]" class="form-control shadow-sm"></div>
                        <div class="mb-3"><label class="form-label">Link</label><input type="text" name="sliders[${sliderCount}][link]" class="form-control shadow-sm"></div>
                        <div class="mb-3"><label class="form-label">Section ID</label><input type="number" name="sliders[${sliderCount}][section_id]" class="form-control shadow-sm"></div>
                    `;
                    document.getElementById('sliders-container').appendChild(newSlider);
                });
            }

            // Add Slider Group (Arabic/English Pair)
            const addSliderGroupBtn = document.getElementById('add-slider');
            if (addSliderGroupBtn) {
                addSliderGroupBtn.addEventListener('click', function() {
                    const sliderGroup = `
                        <div class="slider-group">
                            <h3>New Arabic Slider</h3>
                            <label>Slider Name (Arabic):</label>
                            <input type="text" name="slider_name[ar][]" class="form-control mb-2" placeholder="Enter Arabic name" required>
                            <label>Slider Link (Arabic):</label>
                            <input type="url" name="slider_link[ar][]" class="form-control mb-3" placeholder="Enter Arabic link">
        
                            <h3>New English Slider</h3>
                            <label>Slider Name (English):</label>
                            <input type="text" name="slider_name[en][]" class="form-control mb-2" placeholder="Enter English name" required>
                            <label>Slider Link (English):</label>
                            <input type="url" name="slider_link[en][]" class="form-control mb-3" placeholder="Enter English link">
                        </div>
                    `;
                    document.getElementById('slider-fields').insertAdjacentHTML('beforeend', sliderGroup);
                });
            }

            // Add Slider with Remove Option
            const addSliderRepeaterBtn = document.getElementById('addSlider');
            if (addSliderRepeaterBtn) {

                addSliderRepeaterBtn.addEventListener('click', function() {
                    const slidersRepeater = document.getElementById('slidersRepeater');
                    const sliderItems = slidersRepeater.getElementsByClassName('slider-item');
                    const index = sliderItems.length;

                    const newSliderItem = document.createElement('div');
                    newSliderItem.classList.add('slider-item', 'border', 'p-3', 'mb-3', 'rounded',
                        'shadow-sm');
                    newSliderItem.innerHTML = `
                        <button type="button" class="btn-close float-end remove-slider" aria-label="Close"></button>
        
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
        
                        <!-- Slider Subtitles -->
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
        
                        <!-- Slider Image -->
                        <div class="mb-3">
                            <label class="form-label">Slider Image:</label>
                            <input type="file" name="sliders[${index}][image]" class="form-control shadow-sm">
                        </div>
        
                        <!-- Slider Link -->
                        <div class="mb-3">
                            <label class="form-label">Slider Link:</label>
                            <input type="text" name="sliders[${index}][link]" class="form-control shadow-sm">
                        </div>
                    `;

                    slidersRepeater.appendChild(newSliderItem);

                    // Remove Slider
                    newSliderItem.querySelector('.remove-slider').addEventListener('click', function() {
                        this.closest('.slider-item').remove();
                    });
                });
            }
        });
    </script>


@endsection
