@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Category list') }}
                        <a href="{{ route('category.create') }}" class="btn btn-info">Create Category</a>
                    </div>
                    <div class="card-body">
                        <x-alert />
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($category as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->category_name }}</td>
                                        <td><a href="{{ route('category.edit', ['category' => $item->id]) }}"
                                                class="btn btn-primary">Update</a><button type="button"
                                                class="btn btn-danger"
                                                onclick="event.preventDefault(); if(confirm('Are you sure want to delete?')){
                                                                                                        document.getElementById('form-delete-{{ $item->id }}').submit() }">Delete</button>
                                        </td>
                                    </tr>
                                    <form class="d-none" method="post" id="{{ 'form-delete-' . $item->id }}"
                                        action={{ route('category.destroy', ['category' => $item->id]) }}>
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
