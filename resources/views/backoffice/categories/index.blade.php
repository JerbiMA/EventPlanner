@extends('layouts.admin')

@section('title', 'Event Planner - Categories')

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

        /* Main Content */
        .main-content {
            padding: 40px 40px 60px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .page-title {
            font-size: 36px;
            font-weight: 700;
            color: #7c3aed;
            margin-bottom: 40px;
        }

        .categories-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .categories-header {
            padding: 24px 28px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .categories-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }

        .create-btn {
            background: #7c3aed;
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .create-btn:hover {
            background: #6d28d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);
        }

        .category-list {
            list-style: none;
        }

        .category-item {
            padding: 20px 28px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.2s;
        }

        .category-item:last-child {
            border-bottom: none;
        }

        .category-item:hover {
            background: #fafafa;
        }

        .category-header {
            font-size: 12px;
            font-weight: 600;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px 28px;
            background: #f8f9fa;
            border-bottom: 1px solid #e0e0e0;
        }

        .category-name {
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        .actions-cell {
            position: relative;
        }

        .actions-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: #666;
            padding: 4px 8px;
            border-radius: 4px;
            transition: all 0.2s;
        }

        .actions-btn:hover {
            background: #f0f0f0;
            color: #7c3aed;
        }

        .actions-menu {
            position: absolute;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            min-width: 120px;
            display: none;
            z-index: 10;
        }

        .actions-menu.show {
            display: block;
        }

        .actions-menu a {
            display: block;
            padding: 10px 16px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.2s;
        }

        .actions-menu a:hover {
            background: #f8f9fa;
            color: #7c3aed;
        }

        .actions-menu a:first-child {
            border-radius: 8px 8px 0 0;
        }

        .actions-menu a:last-child {
            border-radius: 0 0 8px 8px;
            color: #dc3545;
        }

        .actions-menu a:last-child:hover {
            background: #fee;
            color: #c82333;
        }

        /* Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal {
            background: white;
            border-radius: 12px;
            padding: 40px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .modal-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 30px;
            text-align: center;
        }

        .modal-form-group {
            margin-bottom: 24px;
        }

        .modal-form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .modal-form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #e0e0e0;
            background: #fafafa;
            border-radius: 8px;
            font-size: 14px;
            color: #333;
            transition: all 0.3s ease;
        }

        .modal-form-group input::placeholder {
            color: #999;
        }

        .modal-form-group input:focus {
            outline: none;
            border-color: #7c3aed;
            background: white;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
        }

        .modal-buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        .modal-btn {
            flex: 1;
            padding: 14px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .modal-btn-cancel {
            background: white;
            border: 2px solid #7c3aed;
            color: #7c3aed;
        }

        .modal-btn-cancel:hover {
            background: #f8f5ff;
        }

        .modal-btn-create {
            background: #7c3aed;
            border: none;
            color: white;
        }

        .modal-btn-create:hover {
            background: #6d28d9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(124, 58, 237, 0.4);
        }

        /* Alert Messages */
        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 14px;
            font-weight: 500;
        }

        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #10b981;
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

        .alert-error li:first-child {
            margin-top: 0;
        }

        @media (max-width: 1024px) {
            .main-content {
                padding-left: 20px;
                padding-right: 20px;
            }
        }
    </style>
@endsection

@section('content')
    <main class="main-content">
        <h1 class="page-title">List of categories</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="categories-card">
            <div class="categories-header">
                <h2 class="categories-title">Categories</h2>
                <button class="create-btn" onclick="openModal()">Create category</button>
            </div>

            <div class="category-header">Category</div>

            <ul class="category-list">
                @forelse($categories as $category)
                    <li class="category-item">
                        <span class="category-name">{{ $category->name }}</span>
                        <div class="actions-cell">
                            <button class="actions-btn" onclick="toggleMenu(this)">⋮</button>
                            <div class="actions-menu">
                                <a href="#" onclick="event.preventDefault(); openEditModal({{ $category->id }}, '{{ $category->name }}')">Edit</a>
                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this category?')) document.getElementById('delete-form-{{ $category->id }}').submit();">Delete</a>
                            </div>
                        </div>
                        <form id="delete-form-{{ $category->id }}" action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                @empty
                    <li class="category-item">
                        <span class="category-name" style="color: #999;">No categories yet. Create one to get started!</span>
                    </li>
                @endforelse
            </ul>
        </div>

        <!-- Create Modal -->
        <div class="modal-overlay" id="categoryModal">
            <div class="modal">
                <h2 class="modal-title">Create category</h2>
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-form-group">
                        <label for="name">Category name</label>
                        <input type="text" id="name" name="name" placeholder="Enter category name" required>
                    </div>
                    <div class="modal-buttons">
                        <button type="button" class="modal-btn modal-btn-cancel" onclick="closeModal()">Cancel</button>
                        <button type="submit" class="modal-btn modal-btn-create">Create</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal-overlay" id="editModal">
            <div class="modal">
                <h2 class="modal-title">Edit category</h2>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-form-group">
                        <label for="edit_name">Category name</label>
                        <input type="text" id="edit_name" name="name" placeholder="Enter category name" required>
                    </div>
                    <div class="modal-buttons">
                        <button type="button" class="modal-btn modal-btn-cancel" onclick="closeEditModal()">Cancel</button>
                        <button type="submit" class="modal-btn modal-btn-create">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    function openModal() {
        document.getElementById('categoryModal').classList.add('show');
    }

    function closeModal() {
        document.getElementById('categoryModal').classList.remove('show');
    }

    function openEditModal(categoryId, categoryName) {
        const editForm = document.getElementById('editForm');
        editForm.action = `/admin/categories/${categoryId}`;
        document.getElementById('edit_name').value = categoryName;
        document.getElementById('editModal').classList.add('show');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.remove('show');
    }

    // Close modal when clicking outside
    document.getElementById('categoryModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    document.getElementById('editModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeEditModal();
        }
    });

    function toggleMenu(button) {
        // Close all other menus
        document.querySelectorAll('.actions-menu').forEach(menu => {
            if (menu !== button.nextElementSibling) {
                menu.classList.remove('show');
            }
        });
        
        // Toggle current menu
        button.nextElementSibling.classList.toggle('show');
    }

    // Close action menus when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.actions-cell')) {
            document.querySelectorAll('.actions-menu').forEach(menu => {
                menu.classList.remove('show');
            });
        }
    });
@endsection
