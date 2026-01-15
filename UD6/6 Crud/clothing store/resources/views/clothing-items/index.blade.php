<h1>Clothing Items</h1>

<a href="{{ route('clothing-items.create') }}">➕ Add New Item</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Name</th>
            <th>Size</th>
            <th>Price</th>
            <th>Color</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->size }}</td>
            <td>${{ number_format($item->price, 2) }}</td>
            <td>{{ $item->color }}</td>
            <td>
                <form method="GET" action="{{ route('clothing-items.show', $item) }}" style="display:inline;">
                    <button type="submit">👁 View</button>
                </form>

                <form method="GET" action="{{ route('clothing-items.edit', $item) }}" style="display:inline;">
                    <button type="submit">✏️ Edit</button>
                </form>

                <form method="POST" action="{{ route('clothing-items.destroy', $item) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')">🗑 Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>