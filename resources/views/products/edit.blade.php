<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('products.editSave', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{ old('name', $product->name) }}">
            </div>
            <div class="form-group">
                <label for="count">Count:</label>
                <input type="number" class="form-control" id="count" name="count" required value="{{ old('count', $product->count) }}">
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="price" required value="{{ old('price', $product->price) }}">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>