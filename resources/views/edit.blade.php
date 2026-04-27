<form action="{{ route('inventory.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="nama_barang" value="{{ $item->nama_barang }}">
    <input type="number" name="price" value="{{ $item->price }}">
    <input type="number" name="stock" value="{{ $item->stock }}">
    <input type="text" name="status" value="{{ $item->status }}">

    <button type="submit">Update</button>
</form>
