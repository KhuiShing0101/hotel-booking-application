@extends("layouts.master")
@section("title", (isset($data)) ? "Hotel Booking::Edit View": "Hotel Booking::Create View")
@section("content")
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        @if (isset($data))
                            <form action="{{ route('viewUpdate') }}" method="post">
                                <input type="hidden" name="id" value="{{ $data->id }}">
                        @else
                            <form action="{{ route("viewStore") }}" method="post">
                        @endif
                            @csrf  
                            <span class="section">{{ (isset($data) ? 'Edit' : 'Create' ) }} Room View</span>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" name="name" value="{{ (isset($data) ? $data->name : old('name') ) }}" placeholder="eg. Lake View" />
                                </div>
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">                                       
                                    <div class="col-md-6 offset-md-3 mt-2">
                                        <button type='submit' class="btn btn-primary">Create</button>
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

         