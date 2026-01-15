<h1>Clothing Item Details</h1>

<p><strong>Name:</strong> {{ $clothingItem->name }}</p>
<p><strong>Size:</strong> {{ $clothingItem->size }}</p>
<p><strong>Price:</strong> ${{ number_format($clothingItem->price, 2) }}</p>
<p><strong>Color:</strong> {{ $clothingItem->color }}</p>

<a href="{{ route('clothing-items.edit', $clothingItem->id) }}">Edit</a>

<form method="POST" action="{{ route('clothing-items.destroy', $clothingItem->id) }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
</form>

<br><br>
<a href="{{ route('clothing-items.index') }}">Back to List</a>
