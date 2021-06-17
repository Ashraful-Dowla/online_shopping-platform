@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Product list') }}
                        <a href="{{ route('product.create') }}" class="btn btn-info">Product Category</a>
                    </div>
                    <div class="card-body">
                        <x-alert />
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($product as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->product_name }}</td>
                                        <td><a href="{{ route('product.edit', ['product' => $item->id]) }}"
                                                class="btn btn-primary">Update</a><button type="button"
                                                class="btn btn-danger"
                                                onclick="event.preventDefault(); if(confirm('Are you sure want to delete?')){
                                                                                                        document.getElementById('form-delete-{{ $item->id }}').submit() }">Delete</button>
                                        </td>
                                    </tr>
                                    <form class="d-none" method="post" id="{{ 'form-delete-' . $item->id }}"
                                        action={{ route('product.destroy', ['product' => $item->id]) }}>
                                        @csrf
                                        @method('delete')
                                    </form>
                                @empty
                                    No Category Available, create one
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
