@extends('layout.master')
@section('title', 'Organization')
@section('page-title', 'Edit Organization')

@section('content')

    <div class="col-lg-12">

        <div class="card">
            {{-- @if (session('error'))
                <div class="bg-danger">{{ session('error') }}</div>
            @endif --}}
            <div class="card-body">
                {{-- <h5 class="card-title">General Form Elements</h5> --}}

                <!-- General Form Elements -->
                <form action="{{ route('organization.update', $organization->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ $organization->name }}" class="form-control">
                        </div>
                        <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10 mt-2">
                            <input type="email" name="email" value="{{ $organization->email }}" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" value="{{ $organization->address }}" class="form-control">
                        </div>

                        <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10 mt-2">
                            <textarea class="form-control" name="description" style="height: 100px">
                                {{ $organization->description }}
                            </textarea>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="number" name="phone_number" value="{{ $organization->phone_number }}"
                                class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <img src="{{ Storage::url($organization->image) }}" width="150" alt="organization image">
                            <input class="form-control" type="file" name="image" value="" id="formFile">
                        </div>
                        {{-- <label for="inputText" class="col-sm-2 col-form-label">DonationTotal</label>
                        <div class="col-sm-10">
                            <input type="text" name="donation_total" class="form-control">
                        </div> --}}
                    </div>

                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">EstablishedYear</label>
                        <div class="col-sm-10">
                            <input type="text" name="established_year" value="{{ $organization->established_year }}"
                                class="form-control">
                        </div>
                        <label for="inputNumber" class="col-sm-2 col-form-label">RegistrationDate</label>
                        <div class="col-sm-10 mt-2">
                            <input type="text" name="registration_date" value="{{ $organization->registration_date }}"
                                class="form-control">
                        </div>

                    </div>


                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Is_Active</legend>
                        <div class="col-sm-10">

                            <div class="form-check">
                                <input class="form-check-input" name="is_active" type="checkbox" id="gridCheck1"
                                    {{ $organization->is_active == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="gridCheck1">
                                    this organization active or not
                                </label>
                            </div>

                        </div>

                        <legend class="col-form-label col-sm-2 pt-0">Has_Delegate</legend>
                        <div class="col-sm-10">

                            <div class="form-check">
                                <input class="form-check-input" name="has_delegate" type="checkbox" id="gridCheck1"
                                    {{ $organization->has_delegate == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="gridCheck1">
                                    this organization has delegate or not
                                </label>
                            </div>

                        </div>
                    </div>

                    <hr>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-outline-primary w-25">Update</button>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>

    </div>


@endsection
