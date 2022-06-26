@extends('cms.parent')

@section('title', 'Admin')

@section('css')

@endsection

@section('Main-title', 'Edit Admin')

@section('sub-title', 'Admin')

@section('content')
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">edit Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="edit_form">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class=" col-sm-3">

                    </div>
                    <div class=" col-sm-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control select2 select2-danger" id="country_id" name="country_id"
                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option selected="selected">Alabama</option>
                                @foreach ($countreis as $country)
                                <option @if ($country->id==$admins->country_id)selected @endif value="{{ $country->id}}" >{{ $country->name }}</option>
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="firstname">first Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                          value="{{ $admins->usertow->first_name }}"  placeholder="Enter your First Name">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                          value="{{ $admins->usertow->last_name }}"  placeholder="Enter your Last Name">
                    </div>


                    <div class="form-group col-md-4">
                        <label for="mobile">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile"
                        value="{{ $admins->usertow->mobile }}" placeholder="Enter your mobile">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email">Eamil</label>
                        <input type="email" class="form-control" id="email" name="email"
                        value="{{ $admins->email}}" placeholder="Enter your email">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                        value="{{ $admins->password }}"    placeholder="Enter your password">
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="dateOfBirth"> Date Of Birth </label>
                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth"
                        value="{{ $admins->usertow->dateOfBirth }}" placeholder="Enter your password">
                    </div>
                    {{-- <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" id="dateOfBirth" name="dateOfBirth" class="form-control datetimepicker-input"
                            data-target="#reservationdate" />

                    </div> --}}


                    <div class=" col-sm-4">
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control select2 select2-danger"  id="gender" name="gender"
                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                <option selected> {{ $admins->usertow->gender }} </option>
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
                                <option selected> {{ $admins->usertow->status }} </option>
                                <option value="Active">Active</option>
                                <option value="unActive">unActive</option>
                            </select>
                        </div>
                    </div>
                </div>
            <

         <div class="form-group col-md-12">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="Enter image">
            </div>



    </div>


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="button" onclick=" Update({{ $admins->id }})" class="btn btn-primary"> update</button>
        <a href="{{ route('admins.index') }}" type="button" class="btn btn-info">Back</a>

    </div>
    </form>
    </div>
    <!-- /.card -->

@endsection

@section('scripts')

    <script>
        function Update(id) {

            let formData = new FormData();
            formData.append('first_name', document.getElementById('first_name').value);
            formData.append('last_name', document.getElementById('last_name').value);
            formData.append('mobile', document.getElementById('mobile').value);
            formData.append('dateOfBirth', document.getElementById('dateOfBirth').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('status', document.getElementById('status').value);
            formData.append('country_id', document.getElementById('country_id').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('password', document.getElementById('password').value);
             formData.append('image', document.getElementById('image').files[0]);

             storeRoute('/cms/admin/update-admin/'+id, formData );

            // store('/cms/admin/admins/',+id , formData);
            // let redirectUrl='/cms/admin/admins#'
            // update('/cms/admin/admins/'+ id , formData ,redirectUrl);

        }
    </script>

{{-- <script>
    function performUpdate(id){
        let data={
            first_name: document.getElementById('first_name').value,
            country_id: document.getElementById('country_id').value,
            last_name: document.getElementById('last_name').value,
            mobile: document.getElementById('mobile').value,
            dateOfBirth: document.getElementById('dateOfBirth').value,
            gender: document.getElementById('gender').value,
            status: document.getElementById('status').value,
            email: document.getElementById('email').value,
            password: document.getElementById('password').value,


        }
        let redirectUrl='/cms/admin/cities#'
         update('/cms/admin/admins/'+ id , data ,redirectUrl);

    }
    </script> --}}

@endsection
