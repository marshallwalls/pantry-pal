@extends('layouts.app')

@section('title', 'Add Item')

@section('content')
    <h1 class="text-xl font-semibold mb-4">Add New Item</h1>

    <form method="POST" action="{{ route('items.store') }}">
        @csrf

        <!-- Name -->
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

        <!-- Quantity -->
        <div>
            <label for="quantity">Quantity</label>
            <input
                type="number"
                name="quantity"
                id="quantity"
                value="{{ old('quantity', 1) }}"
                min="0"
                required
            >

            @error('quantity')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Location -->
        <div>
            <label for="location">Location</label>
            <select name="location" id="location" required>
                <option value="pantry" @selected(old('location') === 'pantry')>
                    Pantry
                </option>
                <option value="fridge" @selected(old('location') === 'fridge')>
                    Fridge
                </option>
                <option value="freezer" @selected(old('location') === 'freezer')>
                    Freezer
                </option>
            </select>

            @error('location')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Expiration Date -->
        <div>
            <label for="expiration_date">Expiration Date</label>
            <input
                type="date"
                name="expiration_date"
                id="expiration_date"
                value="{{ old('expiration_date', now()->addDays(30)->toDateString()) }}"
            >

            @error('expiration_date')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- Notes -->
        <div>
            <label for="notes">Notes</label>
            <textarea
                name="notes"
                id="notes"
            >{{ old('notes') }}</textarea>

            @error('notes')
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
