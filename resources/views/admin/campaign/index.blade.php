@extends('layout.master')
@section('title', 'Campaign')
@section('page-title', 'Create Campaign')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('campaign.create') }}">
                    <button class="btn btn-outline-primary mt-2 w-25">
                        create
                    </button>
                </a>

                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Target_amount</th>
                            <th>Current_amount</th>
                            <th>Start_date</th>
                            <th>End_date</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campaigns as $campaign)
                            <tr>
                                <td>{{ $campaign->title }}</td>
                                <td>{{ $campaign->description }}</td>
                                <td>{{ $campaign->target_amount }}</td>
                                <td>{{ $campaign->current_amount }}</td>
                                <td><img src="{{ Storage::url($campaign->image) }}" width="100"
                                        alt="campaign image">
                                </td>
                                <td>{{ $campaign->start_date }}</td>
                                <td>{{ $campaign->end_date }}</td>

                                <td>
                                    <a href="{{ route('campaign.show', $campaign->id) }}">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="bi bi-binoculars-fill"></i>
                                        </button>
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('campaign.edit', $campaign->id) }}">
                                        <button type="submit" class="btn btn-info">
                                            <i class="bi bi-database-fill-up"></i>
                                        </button>
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('campaign.destroy', $campaign->id) }}">
                                        <form action="{{ route('campaign.destroy', $campaign->id) }}"
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

            </div>
        </div>
    </div>


@endsection
