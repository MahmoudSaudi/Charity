@extends('layout.master')
@section('title', 'Organization')
{{-- @section('page-title', 'Create Organization') --}}

@section('content')

    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title fs-4">Create Organization</h5>

                <!-- General Form Elements -->
                <form action="{{ route('organization.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <label for="inputText" class="col-sm-2 col-form-label">Email</label>

                        <div class="col-sm-10 mt-2">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Address</label>

                        <div class="col-sm-10">
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <label for="inputText" class="col-sm-2 col-form-label">Description</label>

                        <div class="col-sm-10 mt-2">
                            <textarea class="form-control" name="description" style="height: 100px">
                               {{ old('description') }}
                           </textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="number" name="phone_number" value="{{ old('phone_number') }}" class="form-control">
                                @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10 mt-2">
                            <input type="password" name="password" class="form-control">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="image" value="{{ old('image') }}" id="formFile">
                                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        {{-- <label for="inputText" class="col-sm-2 col-form-label">DonationTotal</label>
                        <div class="col-sm-10">
                            <input type="text" name="donation_total" class="form-control">
                        </div> --}}
                    </div>

                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">EstablishedYear</label>
                        <div class="col-sm-10">
                            <input type="date" name="established_year" value="{{ old('established_year') }}" class="form-control">
                                @error('established_year') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <label for="inputNumber" class="col-sm-2 col-form-label">RegistrationDate</label>
                        <div class="col-sm-10 mt-2">
                            <input type="date" name="registration_date" value="{{ old('registration_date') }}" class="form-control">
                                @error('registration_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>


                    <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Is_Active</legend>
                        <div class="col-sm-10">

                            <div class="form-check">
                                <input class="form-check-input" name="is_active" value="{{ old('is_active') }}" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    Example checkbox
                                </label>
                            </div>

                        </div>

                        <legend class="col-form-label col-sm-2 pt-0">Has_Delegate</legend>
                        <div class="col-sm-10">

                            <div class="form-check">
                                <input class="form-check-input" name="has_delegate" value="{{ old('has_delegate') }}" type="checkbox" id="gridCheck1">
                                <label class="form-check-label"  for="gridCheck1">
                                    Example checkbox
                                </label>
                            </div>

                        </div>
                    </div>

                    <hr>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary w-25">Save</button>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>

    </div>


@endsection
