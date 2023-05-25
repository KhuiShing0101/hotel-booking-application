@extends('layouts.master')
@section('title', 'Hotel Booking::Update Room Image')
@section('content')
        <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                        <h1 style="font-size:20px">Update Room Image</h1>

                        {!! Form::open(['url' => '/backend/room/image/update', 'method' => 'POST', 'files' => true]) !!}

                                @if ($errors->has('file'))
                                    <span style="color:red">{{ $errors->first('file') }}</span>
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
                                                    Choose File <input type="file" name="file" id="fileInput" onchange="chooseFile()">
                                                </label>
                                            </div>
                                            <div class="show-img-preview">
                                                <img src="{{url(getFullImagePath($room_id,$gallery->image_name))}}" class="preview-image" alt="" onclick="browseFile()">
                                            </div>
                                        </div>
                                        <div id="upload-btn" class="upload-btn field item form-group">
                                            <div class="form-group">
                                                <div class="col-md-12 col-sm-12">
                                                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                                                    <a href="" type="button" class="btn btn-danger">Back</a>
                                                    <input type="hidden" name="room_id" value=" {{$roomId}} ">
                                                    <input type="hidden" name="gallery_id" value= " {{$id}} ">
                                                    <input type="hidden" name="is_thumb" value=" {{$thumb}} ">
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

    {{-- Script --}}
    <script>
        showEditImage();

        function showEditImage() {
            $(".file-browse").hide();
            $(".show-img-preview").show();
            $(".upload-btn").show();
        }

        function browseFile() {
            $("#fileInput").trigger("click");
        }

        function chooseFile() {
            file = $("#fileInput")[0].files[0];
            $(".drag-area").addClass("active");
            previewImage(file);
        }

        function previewImage(file) {
            let fileType          = file.type;
            let validExtensions   = ["image/jpeg", "image/jpg", "image/png"];

            if (validExtensions.includes(fileType)) {
                let fileReader    = new FileReader();
                fileReader.onload = () => {
                    let fileUrl   = fileReader.result;
                    $(".preview-image").attr("src", fileUrl);
                }
                fileReader.readAsDataURL(file);
                $(".show-img-preview").show();
                $(".upload-btn").show();
            } else {
                alert("Please upload valid Image Type");
                $(".drag-area").removeClass("active");
            }
        }

    </script>
@endsection
