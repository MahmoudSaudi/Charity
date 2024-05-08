@extends('layout.master')
@section('title', 'Organization')
@section('page-title', 'Show Organization')

@section('content')

    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                {{-- <h5 class="card-title">General Form Elements</h5> --}}

                <!-- General Form Elements -->
                <form>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ $organization->name }}" class="form-control" readonly>
                        </div>
                        <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10 mt-2">
                            <input type="email" name="email" value="{{ $organization->email }}" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="address" value="{{ $organization->address }}" class="form-control" readonly>
                        </div>

                        <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10 mt-2">
                            <textarea class="form-control" name="description" style="height: 100px" readonly>
                                {{ $organization->description }}
                            </textarea>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="number" name="phone_number" value="{{ $organization->phone_number }}" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <img src="{{ Storage::url($organization->image) }}" width="150" alt="organization image">
                        </div>
                        {{-- <label for="inputText" class="col-sm-2 col-form-label">DonationTotal</label>
                        <div class="col-sm-10">
                            <input type="text" name="donation_total" class="form-control">
                        </div> --}}
                    </div>

                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">EstablishedYear</label>
                        <div class="col-sm-10">
                            <input type="text" name="established_year" value="{{ $organization->established_year }}" class="form-control" readonly>
                        </div>
                        <label for="inputNumber" class="col-sm-2 col-form-label">RegistrationDate</label>
                        <div class="col-sm-10 mt-2">
                            <input type="text" name="registration_date" value="{{ $organization->registration_date }}" class="form-control" readonly>
                        </div>

                    </div>


                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Is_Active</legend>
                        <div class="col-sm-10">

                            <div class="form-check">
                                <input class="form-check-input" name="is_active" type="checkbox" id="gridCheck1" {{ $organization->is_active == 1 ? 'checked' : '' }} readonly>
                                <label class="form-check-label" for="gridCheck1">
                                    this organization active or not
                                </label>
                            </div>

                        </div>

                        <legend class="col-form-label col-sm-2 pt-0">Has_Delegate</legend>
                        <div class="col-sm-10">

                            <div class="form-check">
                                <input class="form-check-input" name="has_delegate" type="checkbox" id="gridCheck1" {{ $organization->has_delegate == 1 ? 'checked' : '' }} readonly>
                                <label class="form-check-label" for="gridCheck1">
                                    this organization has delegate or not
                                </label>
                            </div>

                        </div>
                    </div>


                </form><!-- End General Form Elements -->

            </div>
        </div>

    </div>


@endsection
