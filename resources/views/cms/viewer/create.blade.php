@extends('cms.parent')

@section('title', 'Viewer')

@section('css')

@endsection

@section('Main-title', 'Create Viewer')

@section('sub-title', 'Viewer')

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create Viewer</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="Create_form">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class=" col-sm-3">

                    </div>
                    <div class=" col-sm-6">
                        <div class="form-group">
                          <label>Country</label>
                          <select class="form-control select2 select2-danger" id="country_id" name="country_id" data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected="selected">Alabama</option>
                            @foreach ($countreis as $country )
                            <option value="{{ $country->id }}" >{{ $country->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                </div>

                <div class="row">
                <div class="form-group col-md-4">
                    <label for="firstname">first Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                        placeholder="Enter your First Name">
                </div>

                <div class="form-group col-md-4">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                        placeholder="Enter your Last Name">
                </div>


                <div class="form-group col-md-4">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile">
                </div>
                </div>

                <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Eamil</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                </div>

                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>
                </div>


                <div class="row">
                <div class="form-group col-md-4">
                    <label for="dateOfBirth"> Date Of Birth </label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" id="dateOfBirth" name="dateOfBirth" class="form-control datetimepicker-input"
                            data-target="#reservationdate" />

                    </div>
                </div>

                <div class=" col-sm-4">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control select2 select2-danger" id="gender" name="gender"
                            data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected> </option>
                            <option value="Male">Male</option>
                            <option value="Femail">Femail</option>
                        </select>
                    </div>
                </div>


                <div class=" col-sm-4">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control select2 select2-danger" id="status" name="status"
                            data-dropdown-css-class="select2-danger" style="width: 100%;">
                            <option selected> </option>
                            <option value="Active">Active</option>
                            <option value="unActive">unActive</option>
                        </select>
                    </div>
                </div>
                </div>

                <div class="form-group col-md-12">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Enter image">
                </div>



            </div>


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="button" onclick="performStore()" class="btn btn-primary">Store</button>
        <a href="{{ route('viewers.index') }}" type="button"  class="btn btn-info">Back</a>

    </div>
    </form>
    </div>
    <!-- /.card -->

@endsection

@section('scripts')

<script>
    function performStore(){

        let fromData = new FromData();
            fromData.append('firstname',document.getElementById('firstname').value);
            fromData.append('lastname',document.getElementById('lastname').value);
            fromData.append('mobile',document.getElementById('mobile').value);
            fromData.append('dateOfBirth',document.getElementById('dateOfBirth').value);
            fromData.append('gender',document.getElementById('gender').value);
            fromData.append('status',document.getElementById('status').value);
            fromData.append('country_id',document.getElementById('country_id').value);
            fromData.append('email',document.getElementById('email').value);
            fromData.append('password',document.getElementById('password').value);
            fromData.append('image',document.getElementById('image').file[0]);

        store('/cms/admin/viewers' ,formdata );
    }
    </script>

@endsection
