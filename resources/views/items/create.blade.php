@extends('layouts.app')

@section('title', 'Add Item')

@section('content')
    <h1 class="text-xl font-semibold mb-4">Add New Item</h1>

    <form method="POST" action="{{ route('items.store') }}">
        @csrf

        <div>
            <label for="name">Name</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                required
            >

            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">Description</label>
            <textarea
                name="description"
                id="description"
            >{{ old('description') }}</textarea>

            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="status">Status</label>
            <select name="status" id="status" required>
                <option value="">Choose status</option>
                <option value="pending" @selected(old('status') === 'pending')>
                    Pending
                </option>
                <option value="active" @selected(old('status') === 'active')>
                    Active
                </option>
                <option value="archived" @selected(old('status') === 'archived')>
                    Archived
                </option>
            </select>

            @error('status')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-top: 1rem;">
            <button type="submit">
                Create Item
            </button>

            <a href="{{ route('items.index') }}">
                Cancel
            </a>
        </div>
    </form>
@endsection
