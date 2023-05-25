@extends("layouts.master")
@section("title", "Hotel Booking::Create Bed")
@section("content")
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="" action="{{ route('amenitiesStore') }}" method="post" novalidate>
                                @csrf
                                <span class="section">Create Room Amenities</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="name" placeholder="eg. Amenities" required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Type<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="type" id="" class="form-control" required="required">
                                            <option value="">Select Type</option>
                                            <option value="1">General</option>
                                            <option value="2">Bathroom</option>
                                            <option value="3">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3 mt-2">
                                            <button type='submit' name="submit" class="btn btn-primary">Submit</button>
                                            <button type='reset' class="btn btn-success">Reset</button> 
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@if ($errors->has('name'))
    <script>
        $(document).ready(function () {
            new PNotify({
                title   : 'Oh No!',
                text    : '{{ $errors->first('name') }}',
                type    : 'error',
                styling : 'bootstrap3'
            });
        })
    </script>
@endif
<!-- /page content -->
@endsection

         