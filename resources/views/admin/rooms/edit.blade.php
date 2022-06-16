@extends('admin.rooms.base')

@section('action-content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Room</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('rooms-management.update',$room->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            {{--<div class="form-group row">--}}
                            {{--<label for="title_en" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                            {{--<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->name}}" required autocomplete="name" autofocus>--}}

                            {{--@error('name')--}}
                            {{--<span class="invalid-feedback" role="alert">--}}
                            {{--<strong>{{ $message }}</strong>--}}
                            {{--</span>--}}
                            {{--@enderror--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group row">
                                <label for="hotel"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Hotel') }}</label>

                                <div class="col-md-6">
                                    {{--{{dd($this_hotel)}}--}}
                                    <select name="hotel" id="hotels"
                                            class="form-control hotels @error('hotel')  is-invalid @enderror">
                                        <optgroup label="Hotels">
                                            @foreach($hotels as $hotel)
                                                <option value="{{$hotel->id}}" {{$this_hotel->id == $hotel->id ? 'selected' : ''}}>{{$hotel->name}}</option>
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
                                <label for="description_en"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Description ') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description"
                                              class="form-control @error('description') is-invalid @enderror"
                                              name="description" autocomplete="description"
                                              autofocus>{{$room->description}}</textarea>

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
                            {{--                                    <input type="number" step="0.01"  name="size" class="form-control @error('size') is-invalid @enderror"  value="{{$product->size}}"  autocomplete="size" autofocus>--}}
                            {{--                                    @error('size')--}}
                            {{--                                    <span class="invalid-feedback" role="alert">--}}
                            {{--                                        <strong>{{ $message }}</strong>--}}
                            {{--                                    </span>--}}
                            {{--                                    @enderror--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="form-group row">
                                <label for="price"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input type="text" name="price"
                                           class="form-control @error('price') is-invalid @enderror"
                                           value="{{$room->price}}" required autocomplete="price" autofocus>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                <div class="col-md-6">
                                    {{--<input type="text"   name="code" class="form-control @error('code') is-invalid @enderror"  value="{{$product->type}}" required autocomplete="code" autofocus>--}}
                                    <select name="type" class="form-control @error('type') is-invalid @enderror">
                                        <optgroup label="Types">
                                            @foreach($room_types as $room_type => $room_general_image)
                                                <option value="{{$room_type}}" {{$room->type == $room_type ? 'selected' : ''}}>
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
                                    <input  type="number" name="bad" class="form-control @error('bad') is-invalid @enderror"   value="{{$room->bad}}" required autocomplete="bad" autofocus min="1" max="20" >
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
                                    <input type="number" name="bathroom" class="form-control @error('bathroom') is-invalid @enderror" value="{{$room->bathroom}}" required autocomplete="bathroom" autofocus min="1" max="20" >
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
                                    <input type="number" name="guest_count" class="form-control @error('guest_count') is-invalid @enderror"   value="{{$room->guest_count}}" required autocomplete="guest_count" autofocus min="1" max="20" >
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
                                    <input type="number" name="room_size" class="form-control @error('room_size') is-invalid @enderror"   value="{{$room->room_size}}" required autocomplete="room_size" autofocus min="1" max="1000" >
                                    @error('room_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                @foreach($room_images as $room_image)
                                    <div class="col-md-3 solid">
                                        <img class="room_img-{{$room_image->id}}" width="10%"
                                             src="{{asset($room_image->path)}}" style="width: 120px; height: 120px">
                                        <a class="delete_category pointer room_img-{{$room_image->id}}"
                                           data-id="{{$room_image->id}}">
                                            <i class="material-icons" data-toggle="tooltip" style="color: brown"
                                               title="{{__('Delete')}}">
                                                &#xE872;
                                            </i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group row">
                                <label for="image"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="images[]"
                                               multiple>
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
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="deleteCategoryModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p>{{ __('Are you sure you want to delete these Image?') }}</p>
                        <p class="text-warning">
                            <small>{{ __('This action cannot be undone.') }}</small>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="{{__('Cancel')}}">
                        <button type="button" class="btn btn-danger deleteImage" value="">{{__('Delete')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.delete_category').on('click', function () {
                id = $(this).data('id');

                $('#deleteCategoryModal').modal('show');
            });
            $('.deleteImage').on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/destroy/room-image/" + id,
                    method: 'DELETE',
                    data: {
                        id: id
                    },
                    success: function (response) {
                        $('#deleteCategoryModal').modal('hide');
                        $('.room_img-' + id).remove();
                        var successHtml = '<div class="alert alert-danger">' +
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                            '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></i></strong> ' + response.message +
                            '</div>';
                        $('.messages').html(successHtml);
                    }
                });

            })
        })
    </script>

@endsection
