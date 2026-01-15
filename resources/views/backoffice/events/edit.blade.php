@extends('layouts.admin')

@section('title', 'Edit Event')

@section('styles')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f5f7;
            min-height: 100vh;
        }

        .main-content {
            padding: 40px 40px 60px;
            max-width: 800px;
            margin: 0 auto;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 40px;
            text-align: center;
        }

        .form-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            padding: 40px;
        }

        .form-section {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #333;
            margin-bottom: 24px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #666;
            margin-bottom: 8px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.2s;
            background: #fafafa;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #999;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #7c3aed;
            background: white;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Image Upload Area */
        .image-upload-area {
            width: 100%;
            height: 200px;
            background: #f0f0f0;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px dashed #d0d0d0;
            margin-bottom: 20px;
        }

        .image-upload-area:hover {
            background: #e8e8e8;
            border-color: #7c3aed;
        }

        .image-upload-area.has-image {
            border: none;
            padding: 0;
            overflow: hidden;
        }

        .image-upload-area img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-icon {
            width: 48px;
            height: 48px;
            margin-bottom: 8px;
            opacity: 0.4;
        }

        .upload-icon svg {
            width: 100%;
            height: 100%;
            stroke: #666;
        }

        .image-upload-area input[type="file"] {
            position: absolute;
            width: 0;
            height: 0;
            opacity: 0;
            pointer-events: none;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: #7c3aed;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background: #6d28d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.4);
        }

        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 500;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #ef4444;
        }

        .alert-error ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .alert-error li {
            margin-top: 4px;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endsection

@section('content')
    <main class="main-content">
        <h1 class="page-title">Edit Event</h1>

        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-section">
                    <div class="form-group">
                        <label for="title">Event Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $event->title) }}" placeholder="Title" required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select id="category_id" name="category_id" required>
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $event->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="start_date">Start date</label>
                            <input type="datetime-local" id="start_date" name="start_date" 
                                   value="{{ old('start_date', $event->start_date->format('Y-m-d\TH:i')) }}" placeholder="date" required>
                        </div>

                        <div class="form-group">
                            <label for="end_date">End date</label>
                            <input type="datetime-local" id="end_date" name="end_date" 
                                   value="{{ old('end_date', $event->end_date->format('Y-m-d\TH:i')) }}" placeholder="date" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="place">Place</label>
                            <input type="text" id="place" name="place" value="{{ old('place', $event->place) }}" placeholder="Place" required>
                        </div>

                        <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <input type="number" id="capacity" name="capacity" 
                                   value="{{ old('capacity', $event->capacity) }}" placeholder="Capacity" min="1" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">Pricing</label>
                        <select id="pricing_type" onchange="togglePrice()">
                            <option value="free" {{ old('is_free', $event->is_free) ? 'selected' : '' }}>Free Access</option>
                            <option value="paid" {{ old('price', $event->price) && !old('is_free', $event->is_free) ? 'selected' : '' }}>Paid Access</option>
                        </select>
                        <input type="number" id="price" name="price" 
                               value="{{ old('price', $event->price) }}" 
                               placeholder="Enter price" min="0" step="0.01" 
                               style="margin-top: 10px; display: {{ old('price', $event->price) && !old('is_free', $event->is_free) ? 'block' : 'none' }};">
                        <input type="hidden" id="is_free" name="is_free" value="{{ old('is_free', $event->is_free ? '1' : '0') }}">
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Event Description</h2>
                    
                    <div class="form-group">
                        <label for="image">Event Image</label>
                        <label for="image" class="image-upload-area {{ $event->image ? 'has-image' : '' }}" id="imagePreviewArea">
                            <div class="upload-icon" id="uploadIcon" style="{{ $event->image ? 'display: none;' : '' }}">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <img id="imagePreview" src="{{ $event->image ? asset('storage/' . $event->image) : '' }}" 
                                 style="{{ $event->image ? 'display: block;' : 'display: none;' }} width: 100%; height: 100%; object-fit: cover;" 
                                 alt="Preview">
                        </label>
                        <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    </div>

                    <div class="form-group">
                        <label for="description">Event Description</label>
                        <textarea id="description" name="description" placeholder="Type here..." required>{{ old('description', $event->description) }}</textarea>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Update event</button>
            </form>
        </div>
    </main>
@endsection

@section('scripts')
    function previewImage(event) {
        const file = event.target.files[0];
        const previewArea = document.getElementById('imagePreviewArea');
        const uploadIcon = document.getElementById('uploadIcon');
        const imagePreview = document.getElementById('imagePreview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
                uploadIcon.style.display = 'none';
                previewArea.classList.add('has-image');
            }
            reader.readAsDataURL(file);
        }
    }

    function togglePrice() {
        const pricingType = document.getElementById('pricing_type').value;
        const priceInput = document.getElementById('price');
        const isFreeInput = document.getElementById('is_free');
        
        if (pricingType === 'free') {
            priceInput.style.display = 'none';
            priceInput.value = '';
            isFreeInput.value = '1';
        } else {
            priceInput.style.display = 'block';
            isFreeInput.value = '0';
        }
    }

    // Initialize on page load
    window.addEventListener('load', function() {
        togglePrice();
    });
@endsection
