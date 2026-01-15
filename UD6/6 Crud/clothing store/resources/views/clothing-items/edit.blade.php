<h1>Edit Clothing Item</h1>

<!-- Back to List Button (at the top) -->
<div style="margin-bottom: 15px;">
    <a href="{{ route('clothing-items.index') }}"
       style="padding: 8px 16px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px;">
        🔙 Back to List
    </a>
</div>

<form method="POST" action="{{ route('clothing-items.update', $clothingItem->id) }}">
    @csrf
    @method('PUT')

    <table border="0" cellpadding="8">
        <tr>
            <td><label for="name">Name:</label></td>
            <td><input type="text" name="name" id="name" value="{{ old('name', $clothingItem->name) }}" required></td>
        </tr>
        <tr>
            <td><label for="size">Size:</label></td>
            <td><input type="text" name="size" id="size" value="{{ old('size', $clothingItem->size) }}" required></td>
        </tr>
        <tr>
            <td><label for="price">Price ($):</label></td>
            <td><input type="text" name="price" id="price" value="{{ old('price', $clothingItem->price) }}" required></td>
        </tr>
        <tr>
            <td><label for="color">Color:</label></td>
            <td><input type="text" name="color" id="color" value="{{ old('color', $clothingItem->color) }}" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: right;">
                <button type="submit" style="padding: 8px 16px; background-color: #4CAF50; color: white; border: none; border-radius: 4px;">
                    ✅ Update
                </button>
                <a href="{{ route('clothing-items.index') }}"
                   style="padding: 8px 16px; background-color: #f44336; color: white; border: none; border-radius: 4px; text-decoration: none; margin-left: 8px;">
                    ❌ Cancel
                </a>
            </td>
        </tr>
    </table>
</form>