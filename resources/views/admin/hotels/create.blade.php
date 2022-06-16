@extends('admin.services.base')

@section('action-content')
    {{--<script type="text/javascript"--}}
            {{--src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places"></script>--}}

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new Hotel</div>
                    <div class="panel-body">
                        <form class="form-horizontal"  role="form" method="POST" action="{{ route('hotels-management.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description ') }}</label>
                                <div class="col-md-6">
                                    <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description"  autocomplete="description" autofocus></textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                    <input   name="autocomplete" id="autocomplete"  class="form-control"  >
                                    <input type="hidden" id="latitude" name="latitude" class="form-control" readonly="readonly">
                                    <input type="hidden" name="longitude" id="longitude" class="form-control" readonly="readonly">
                                    <input type="hidden" name="place" id="place" class="form-control" readonly="readonly">
                                    <input type="hidden" name="street_number" id="street_number" class="form-control" readonly="readonly">
                                    <input type="hidden" name="city" id="city" class="form-control" readonly="readonly">
                                    <input type="hidden" name="country" id="country" class="form-control" readonly="readonly">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror    @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--<div class="form-group" id="latitudeArea">--}}
                                {{--<label>Latitude</label>--}}
                                {{--<input type="text" id="latitude" name="latitude" class="form-control">--}}
                            {{--</div>--}}
                            {{--<div class="form-group" id="longtitudeArea">--}}
                                {{--<label>Longitude</label>--}}
                                {{--<input type="text" name="longitude" id="longitude" class="form-control">--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<div style="width: 400px; height: 350px;">--}}
                                        {{--{!! Mapper::render() !!}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="images[]" multiple>
                                        <label class="custom-file-label" for="file">Choose image</label>
                                    </div>
                                    @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
