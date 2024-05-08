@extends('layout.master')
@section('title', 'Organization')
@section('page-title', 'Organization')

@section('content')

    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">

                <a href="{{ route('organization.create') }}">
                    <button class="btn btn-outline-primary mt-2 w-25">
                        create
                    </button>
                </a>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone number</th>
                            <th>Image</th>
                            <th>Is active</th>
                            <th>Has delegate</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organizations as $organization)
                            <tr>
                                <td>{{ $organization->name }}</td>
                                <td>{{ $organization->email }}</td>
                                <td>{{ $organization->address }}</td>
                                <td>{{ $organization->phone_number }}</td>
                                <td>
                                    <img src="{{ Storage::url($organization->image) }}" alt="image organization" width="85" class="img-thumbnail">
                                </td>
                                <td>{{ $organization->is_active }}</td>
                                <td>{{ $organization->has_delegate }}</td>
                                <td>
                                    <a href="{{ route('organization.show', $organization->id) }}">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="bi bi-binoculars-fill"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('organization.edit', $organization->id) }}">
                                        <button type="submit" class="btn btn-info">
                                            <i class="bi bi-database-fill-up"></i>
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('organization.destroy', $organization->id) }}">
                                        <form action="{{ route('organization.destroy', $organization->id) }}"
                                            method="post" enctype="multipart/form-data">
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
                {{ $organizations->links('pagination::bootstrap-4') }}
                <!-- End Table with stripped rows -->

            </div>
        </div>

    </div>


@endsection
