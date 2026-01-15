<form method="POST" action="{{ route('clothing-items.store') }}">
    @csrf
    <input name="name" placeholder="Name">
    <input name="size" placeholder="Size">
    <input name="price" placeholder="Price">
    <input name="color" placeholder="Color">
    <button type="submit">Save</button>
</form>