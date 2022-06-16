@extends('admin.rooms.base')

@section('action-content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new Room</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('rooms-management.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Hotel') }}</label>
                                <div class="col-md-6">
                                    <select name="hotel" id="hotels" class="form-control hotels @error('category') is-invalid @enderror" >
                                        <optgroup label="Hotels">
                                            @foreach($hotels as $hotel)
                                                <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                            @endforeach
                                        </optgroup>

                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description_en" class="col-md-4 col-form-label text-md-right">{{ __('Description ') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description_en"  class="form-control @error('description') is-invalid @enderror" name="description"   autocomplete="description" autofocus></textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
{{--                            <div class="form-group row">--}}
{{--                                <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Size') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input type="number" step="0.01"  name="size" class="form-control @error('size') is-invalid @enderror"  value="{{ old('size') }}"  autocomplete="size" autofocus>--}}
{{--                                    @error('size')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input type="text"   name="price" class="form-control @error('price') is-invalid @enderror"  value="{{ old('price') }}" required autocomplete="price" autofocus>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                <div class="col-md-6">
                                    <select    name="type" class="form-control @error('code') is-invalid @enderror">
                                        <optgroup label="Types">
                                            @foreach($room_types as $room_type => $room_general_image)
                                                <option value="{{$room_type}}">
                                                    {{$room_type}}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bad" class="col-md-4 col-form-label text-md-right">{{ __('Bad Count') }}</label>

                                <div class="col-md-6">
                                    <input type="number" name="bad" class="form-control @error('bad') is-invalid @enderror"  value="{{ old('bad') }}" required autocomplete="bad" autofocus min="1" max="20" >
                                    @error('bad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bathroom" class="col-md-4 col-form-label text-md-right">{{ __('Bathroom Count') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="bathroom" class="form-control @error('bathroom') is-invalid @enderror"  value="{{ old('bathroom') }}" required autocomplete="bathroom" autofocus min="1" max="20" >
                                    @error('bathroom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="guest_count" class="col-md-4 col-form-label text-md-right">{{ __('Guest Count') }}</label>

                                <div class="col-md-6">
                                    <input type="number" name="guest_count" class="form-control @error('guest_count') is-invalid @enderror"  value="{{ old('guest_count') }}" required autocomplete="guest_count" autofocus min="1" max="20" >
                                    @error('guest_count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="room_size" class="col-md-4 col-form-label text-md-right">{{ __('Room Size') }}</label>
                                <div class="col-md-6">
                                    <input type="number" name="room_size" class="form-control @error('room_size') is-invalid @enderror"  value="{{ old('room_size') }}" required autocomplete="room_size" autofocus min="1" max="1000" >
                                    @error('room_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="images[]" multiple>
                                        <label class="custom-file-label" for="file">Choose image</label>
                                    </div>
                                    @error('image')
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
