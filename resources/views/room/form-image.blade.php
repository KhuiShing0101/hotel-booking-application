@extends('layouts.master')
@section('title', 'Hotel Booking::Manage Room Image')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <h1 style="font-size:20px">Manage Hotel Room Image</h1>

                            {!! Form::open(['url' => '/backend/room/image/store', 'method' => 'POST', 'files' => true]) !!}

                                @if ($errors->has('file'))
                                    <span style="color:red">{{ $errors->first('file') }}</span>
                                @endif
                                @if (count($room_galleries) >= 1)
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="row">

                                                @php
                                                $count = 0;
                                                @endphp

                                                @foreach ($room_galleries as $room_gallery)

                                                    @php
                                                        $count ++;
                                                        $thumb = ($count == 1) ? 'yes' : 'no';
                                                    @endphp

                                                    <div class="col-md-3 col-sm-3 m-2 p-0">
                                                        <img src="{{ url (getFullImagePath($id, $room_gallery->image_name)) }}"
                                                            class="preview-img mb-2" style="height: 100px;">
                                                        <div>
                                                            <a href="{{ url('/backend/room/image/edit') }}/{{$id}}/gallery/{{ $room_gallery->id }}/thumb/{{$thumb}}"
                                                                class="btn btn-sm px-2 btn-secondary">Edit</a>

                                                        @if($count!=1)

                                                            <a href="{{ url('/backend/room/image/deleted') }}/{{ $room_gallery->id }}"
                                                                class="btn btn-sm px-1  btn-danger"
                                                                onclick="return confirm('Are your Sure to Delete?')">Delete</a>
                                                        @endif

                                                        </div>
                                                    </div>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="drag-area">
                                            <div class="file-browse">
                                                <div class="icon">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                </div>
                                                <header>Drag & Drop to Upload File</header>
                                                <span>OR</span>
                                                <label class="input-file">
                                                    Choose File <input type="file" name="file" id="fileInput"
                                                        onchange="chooseFile()">
                                                </label>
                                            </div>
                                            <div class="show-img-preview">
                                                <img src="" class="preview-image" alt="" onclick="browseFile()">
                                            </div>
                                        </div>
                                        <div id="upload-btn" class="upload-btn field item form-group">
                                            <div class="form-group">
                                                <div class="col-md-12 col-sm-12">
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary">Upload</button>
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="clearFile()">Clear</button>
                                                    <input type="hidden" name="room-id" value="{{ $id }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <script>
        function browseFile() {
            $("#fileInput").trigger("click");
        }

        function chooseFile() {
            file = $("#fileInput")[0].files[0];
            $(".drag-area").addClass("active");
            previewImage(file);
        }

        function previewImage(file) {
            let fileType = file.type;
            // let validExtensions   = ["image/jpeg", "image/jpg", "image/png"];

            // if (validExtensions.includes(fileType)) {
            let fileReader = new FileReader();
            fileReader.onload = () => {
                let fileUrl = fileReader.result;
                $(".preview-image").attr("src", fileUrl);
            }
            fileReader.readAsDataURL(file);
            $(".show-img-preview").show();
            $(".upload-btn").show();
            $(".file-browse").hide();
            // } else {
            //     alert("Please upload valid Image Type");
            //     $(".drag-area").removeClass("active");
            // }
        }

        function clearFile() {
            $(".show-img-preview").hide();
            $(".upload-btn").hide();
            $(".file-browse").show();
            $("#fileInput").attr("val", "");
            $(".drag-area").removeClass("active");
            $(".preview-image").attr("src", "");
        }
    </script>

@endsection
