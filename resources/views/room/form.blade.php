    @extends("layouts.master")
    @section("title", "Hotel Booking::Create Room")
    @section("content")
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form class="" action="{{ route('roomStore') }}" method="post" novalidate>
                                @csrf
                                <span class="section">Create Hotel Room</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room Name<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="eg. Deluxe Room" required="required" />
                                        @if ($errors->has('name'))
                                            <span style="color:red">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room Type<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="type" id="" class="form-control">
                                            <option value="">Choose Room Type</option>
                                            <option value="1">Standard</option>
                                            <option value="2">Club Floor</option>
                                            <option value="3">Suite</option>
                                        </select>
                                        @if ($errors->has('type'))
                                            <span style="color:red">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room Occupancy<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" class="form-control" name="occupancy" value="{{ old('occupancy') }}" required="required" />
                                        @if ($errors->has('occupancy'))
                                            <span style="color:red">{{ $errors->first('occupancy') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room Bed<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="bed" id="" class="form-control">
                                            <option value="">Choose Bed</option>
                                            @foreach ($beds as $bed)
                                                <option value="{{ $bed->id }}" {{ ($bed->id == old('bed')) ? 'selected' : '' }}>{{ $bed->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('bed'))
                                            <span style="color:red">{{ $errors->first('bed') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room Size<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" class="form-control" name="size" value="{{ old('size') }}" required="required" />
                                        @if ($errors->has('size'))
                                            <span style="color:red">{{ $errors->first('size') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room View<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="view" id="" class="form-control">
                                            <option value="">Choose Room View</option>
                                            @foreach ($views as $view)
                                                <option value="{{ $view->id }}" {{ ($view->id == old('view')) ? 'selected' : '' }} >{{ $view->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('view'))
                                            <span style="color:red">{{ $errors->first('view') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room Price Per Day<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" class="form-control" name="room_price" value="{{ old('room_price') }}" required="required" />
                                        @if ($errors->has('room_price'))
                                            <span style="color:red">{{ $errors->first('room_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room Extra Bed Price Per Day<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="number" class="form-control" name="extra_bed_price" value="{{ old('extra_bed_price') }}" required="required" />
                                        @if ($errors->has('extra_bed_price'))
                                            <span style="color:red">{{ $errors->first('extra_bed_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room Special Features<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                            <div class="mb-2">
                                                @foreach ($special_features as $special_feature)
                                                    <label for="{{ $special_feature->name }}" class="form-check-label">
                                                        <input type="checkbox" name="special_features[]" value="{{ $special_feature->id }}" {{ (is_array(old('special_features')) && in_array($special_feature->id, old('special_features'))) ? 'checked' : '' }} id="{{ $special_feature->name }}"  />
                                                        {{ $special_feature->name }}
                                                    </label>
                                                @endforeach
                                            </div>
                                            @if ($errors->has('special_features'))
                                                <span style="color:red">{{ $errors->first('special_features') }}</span>
                                            @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Room Amenities<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4>General</h4>
                                                <div class="mb-2">
                                                    @foreach ($general_amenities as $general_amenity)
                                                        <label for="{{ $general_amenity->name }}">
                                                            <input type="checkbox" name="amenities[]" value="{{ $general_amenity->id }}" {{ (is_array(old('amenities')) && in_array($general_amenity->id, old('amenities'))) ? 'checked' : '' }} id="{{ $general_amenity->name }}"  />
                                                            {{ $general_amenity->name }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Bedroom</h4>
                                                <div class="mb-2">
                                                    @foreach ($bedroom_amenities as $bedroom_amenity)
                                                        <label for="{{ $bedroom_amenity->name }}">
                                                            <input type="checkbox" name="amenities[]" value="{{ $bedroom_amenity->id }}" {{ (is_array(old('amenities')) && in_array($bedroom_amenity->id, old('amenities'))) ? 'checked' : '' }} id="{{ $bedroom_amenity->name }}"  />
                                                            {{ $bedroom_amenity->name }}
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h4>Others</h4>
                                                @foreach ($others_amenities as $others_amenity)
                                                    <label for="{{ $others_amenity->name }}">
                                                        <input type="checkbox" name="amenities[]" value="{{ $others_amenity->id }}" {{ (is_array(old('amenities')) && in_array($others_amenity->id, old('amenities'))) ? 'checked' : '' }} id="{{ $others_amenity->name }}"  />
                                                        {{ $others_amenity->name }}
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if ($errors->has('amenities'))
                                            <span style="color:red">{{ $errors->first('amenities') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Description<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="description" id="" cols="30" rows="3" class="form-control">{{ old('description') }}</textarea>
                                        @if ($errors->has('description'))
                                            <span style="color:red">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align" for="detail">Detail<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea name="detail" id="detail" required="required" cols="30" rows="3" class="form-control">{{ old('detail') }}</textarea>
                                        @if ($errors->has('detail'))
                                            <span style="color:red">{{ $errors->first('detail') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3 mt-2">
                                            <button type='submit' name="submit" class="btn btn-primary">Submit</button>
                                            <a href="" type='reset' class="btn btn-success">Cancel</a>
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
    @endsection

