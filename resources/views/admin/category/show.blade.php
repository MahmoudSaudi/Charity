@extends('layout.master')
@section('title', 'Category')
@section('page-title', 'Create Category')

@section('content')

    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">General Form Elements</h5>

                <!-- General Form Elements -->
                <form>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="" class="form-control" readonly>
                        </div>
                        <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10 mt-2">
                            <textarea class="form-control" name="description" style="height: 100px" readonly>

                            </textarea>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" name="image" id="formFile" readonly>
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
