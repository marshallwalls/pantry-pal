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
                    <th>Expires</th>
                    <th>Added</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($items as $item)
                
                    @php
                        $isExpired = $item->expiration_date &&
                            $item->expiration_date->isPast();

                        $isExpiringSoon = $item->expiration_date &&
                            !$isExpired &&
                            $item->expiration_date->between(
                                now(),
                                now()->addDays(7)
                            );
                    @endphp

                    <tr
                        @if($isExpired)
                            style="background-color: #fee2e2; color: #b91c1c;"
                        @elseif($isExpiringSoon)
                            style="background-color: #fef9c3;"
                        @endif
                    >
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ ucfirst($item->location) }}</td>
                        <td>
                            {{ $item->expiration_date
                                ? $item->expiration_date->format('Y-m-d')
                                : '—' }}
                        </td>
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