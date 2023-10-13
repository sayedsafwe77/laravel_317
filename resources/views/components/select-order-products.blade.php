<div class="row" id="product-component">
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <select name="product_id" class="form-control col-6" id="product_id">
        @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->name }}</option>
        @endforeach
    </select>
    <input type="number" name="quantity" placeholder="Enter Quantity" class="form-control col-3">
</div>
