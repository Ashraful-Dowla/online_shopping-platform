@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($product as $item)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        @if ($item->product_image)
                            <img class="card-img-top" src="{{ asset('/storage/images/' . $item->product_image) }}"
                                alt="{{ $item->product_name }}" width="40" height="300">
                        @else
                            <img class="card-img-top" src="{{ asset('/storage/images/dummy-product-image.jpg') }}"
                                alt="No image" width="40" height="300">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Product Title {{ $item->product_name }}</h5>
                            <p class="card-text">Product Price {{ $item->product_price }}</p>
                            @foreach ($category as $category_item)
                                @if ($category_item->id == $item->category_id)
                                    <p class="card-text">Category Type: {{ $category_item->category_name }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                No Products Available
            @endforelse

        </div>
    </div>
@endsection
