@extends('adminlte::page')
@section('content')
    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <div>
            <label class="form-label" for="user_id">Select User</label>
            <select name="user_id" class="form-control" id="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <label class="form-label col-12" for="product_id">Select Product</label>
            <div class="col-12" id="products-section">
                <x-select-order-products :$products />
                {{-- <button class="btn btn-primary col-2" id="add-product">Add Product</button> --}}
            </div>
            <input type="submit" class="btn btn-primary">

        </div>
    </form>
    <script>
        // const add_button = document.querySelector('#add-product');
        // add_button.addEventListener('click', addNewProductComponent);

        // function addNewProductComponent(e) {
        //     e.preventDefault();
        //     const product_component = document.querySelector('#product-component');
        //     const products_section = document.querySelector('#products-section');
        //     console.log(product_component);
        //     console.log(createElement(product_component));
        //     products_section.insertBefore(createElement(product_component), add_button);
        // }

        // function createElement(str) {
        //     var frag = document.createDocumentFragment();

        //     var elem = document.createElement('div');
        //     elem.innerHTML = str;

        //     while (elem.childNodes[0]) {
        //         frag.appendChild(elem.childNodes[0]);
        //     }
        //     return frag;
        // }
    </script>
@endsection
