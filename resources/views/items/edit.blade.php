dd('update hit');
@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Item</h1>

    <form method="POST" action="{{ route('items.update', $item) }}">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Name
            </label>
            <input
                type="text"
                name="name"
                value="{{ old('name', $item->name) }}"
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>

        <!-- Quantity -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Quantity
            </label>
            <input
                type="number"
                name="quantity"
                value="{{ old('quantity', $item->quantity) }}"
                min="0"
                class="w-full border rounded px-3 py-2"
                required
            >
        </div>

        <!-- Location -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Location
            </label>
            <select
                name="location"
                class="w-full border rounded px-3 py-2"
                required
            >
                <option value="pantry" {{ old('location', $item->location) === 'pantry' ? 'selected' : '' }}>
                    Pantry
                </option>
                <option value="fridge" {{ old('location', $item->location) === 'fridge' ? 'selected' : '' }}>
                    Fridge
                </option>
                <option value="freezer" {{ old('location', $item->location) === 'freezer' ? 'selected' : '' }}>
                    Freezer
                </option>
            </select>
        </div>

        <!-- Expiration Date -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Expiration Date
            </label>
            <input
                type="date"
                name="expiration_date"
                value="{{ old('expiration_date', $item->expiration_date) }}"
                class="w-full border rounded px-3 py-2"
            >
        </div>

        <!-- Notes -->
        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Notes
            </label>
            <textarea
                name="notes"
                class="w-full border rounded px-3 py-2"
            >{{ old('notes', $item->notes) }}</textarea>
        </div>

        <div class="flex gap-4">
            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded"
            >
                Update Item
            </button>

            <a
                href="{{ route('items.index') }}"
                class="px-4 py-2 border rounded"
            >
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
