@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Category') }}</div>
                    <div class="card-body">
                        <x-alert />
                        <form method="POST" action="{{ route('category.update', ['category' => $category->id]) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group row">
                                <label for="category_name" class="col-md-4 col-form-label text-md-right">Category
                                    Name</label>
                                <div class="col-md-6">
                                    <input id="category_name" type="text" class="form-control"
                                        value="{{ $category->category_name }}" name="category_name" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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
