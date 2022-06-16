@extends('admin.services.base')

@section('action-content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Hotel</div>
                    <div class="panel-body">
                        <form class="form-horizontal"  role="form" method="POST" action="{{ route('hotels-management.update',$hotel->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name ') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $hotel->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description"   autocomplete="description" autofocus>
                                        {{ $hotel->description }}
                                    </textarea>

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
                                    <input name="autocomplete" id="autocomplete"  class="form-control @error('address') is-invalid @enderror" value="{{$hotel->street_number." " }}{{$hotel->address."," }} {{$hotel->city .","}} {{$hotel->country}}"  autocomplete="address" autofocus>

                                    <input type="hidden" id="latitude" name="latitude" class="form-control" value="{{$hotel->latitude}}" readonly="readonly">
                                    <input type="hidden" name="longitude" id="longitude" class="form-control" value="{{$hotel->longitude}}" readonly="readonly">
                                    <input type="hidden" name="place" id="place" class="form-control" value="{{$hotel->address}}" readonly="readonly">
                                    <input type="hidden" name="city" id="city" class="form-control" value="{{$hotel->city}}" readonly="readonly">
                                    <input type="hidden" name="street_number" id="street_number"  class="form-control" value="{{$hotel->street_number}}" readonly="readonly">
                                    <input type="hidden" name="country" id="country" class="form-control" value="{{$hotel->country}}" readonly="readonly">

                                    {{--@error('address')--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@enderror--}}
                                </div>
                            </div>
                            <div class="form-group row">
                            @foreach($hotel_images as $hotel_image)
                                <div class="col-md-3 solid" >
                                <img   class="hotel_img-{{$hotel_image->id}}"  width="10%" src="{{asset($hotel_image->path)}}" style="width: 120px; height: 120px">
                                <a class="delete_category pointer hotel_img-{{$hotel_image->id}}" data-id="{{$hotel_image->id}}">
                                    <i class="material-icons" data-toggle="tooltip" style="color: brown" title="{{__('Delete')}}" >
                                        &#xE872;
                                    </i>
                                </a>
                                </div>
                            @endforeach
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
                        <p class="text-warning"><small>{{ __('This action cannot be undone.') }}</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="{{__('Cancel')}}">
                        <button type="button" class="btn btn-danger deleteImage" value="" >{{__('Delete')}}</button>
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
            $('.delete_category').on('click', function(){
                id = $ (this).data('id');

                $('#deleteCategoryModal').modal('show');
            });
            $('.deleteImage').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "/destroy/image/"+id,
                    method: 'DELETE',
                    data: {
                        id:id
                    },
                    success: function(response){
                        $('#deleteCategoryModal').modal('hide');
                        $('.hotel_img-'+id).remove();
                        var successHtml = '<div class="alert alert-danger">'+
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                            '<strong><i class="glyphicon glyphicon-ok-sign push-5-r"></i></strong> '+ response.message +
                            '</div>';
                        $('.messages').html(successHtml);
                    }});

            })
        })
    </script>



@endsection
