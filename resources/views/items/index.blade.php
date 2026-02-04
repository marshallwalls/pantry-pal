@extends('layouts.app')

@section('title', 'My Items')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold">My Items</h1>

        <a href="{{ route('items.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Add Item
        </a>
    </div>

    @if ($items->count())
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Added</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ ucfirst($item->location) }}</td>
                        <td>{{ ucfirst($item->status) }}</td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('items.edit', $item) }}">Edit</a> 

                            <form method="POST"
                                action="{{ route('items.destroy', $item) }}"
                                style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Delete this item?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 1rem;">
            {{ $items->links() }}
        </div>
    @else
        <p>
            You don't have any items yet.
            <a href="{{ route('items.create') }}">Create your first one</a>.
        </p>
    @endif
@endsection