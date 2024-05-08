@extends('layout.master')
@section('title', 'Category')
@section('page-title', 'Create Category')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('category.create') }}">
                    <button class="btn btn-outline-primary mt-2 w-25">
                        create
                    </button>
                </a>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Organization</th>
                            <th>Description</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->organization->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <img src="{{ Storage::url($category->image) }}" width="100"
                                        alt="category image">
                                </td>
                                <td>
                                    <a href="{{ route('category.show', $category->id) }}">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="bi bi-binoculars-fill"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}">
                                        <button type="submit" class="btn btn-info">
                                            <i class="bi bi-database-fill-up"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('category.destroy', $category->id) }}">
                                        <form action="{{ route('category.destroy', $category->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="bi bi-archive-fill"></i>
                                            </button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $categories->links('pagination::bootstrap-4') }}

            </div>
        </div>
    </div>


@endsection
