@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Product') }}</div>

                    <div class="card-body">
                        <x-alert />
                        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="product_name" class="col-md-4 col-form-label text-md-right">Product
                                    Name</label>
                                <div class="col-md-6">
                                    <input id="product_name" type="text" class="form-control" name="product_name" required
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_select" class="col-md-4 col-form-label text-md-right">Select
                                    Category</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="category_select" name="category_id">
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="product_price" class="col-md-4 col-form-label text-md-right">Product
                                    Price</label>
                                <div class="col-md-6">
                                    <input id="product_price" type="text" class="form-control" name="product_price" required
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">
                                    Product Image upload</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" accept="image/*" />
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
