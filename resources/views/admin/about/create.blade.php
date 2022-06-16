@extends('admin.services.base')

@section('action-content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new Post</div>
                    <div class="panel-body">
                        <form class="form-horizontal"  role="form" method="POST" action="{{ route('about-management.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name ') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
{{--                            <div class="form-group row">--}}
{{--                                <label for="name_hy" class="col-md-4 col-form-label text-md-right">{{ __('Name HY') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="name_hy" type="text" class="form-control @error('name_hy') is-invalid @enderror" name="name_hy" value="{{ old('name_hy') }}" required autocomplete="name_hy" autofocus>--}}

{{--                                    @error('name_hy')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="name_ru" class="col-md-4 col-form-label text-md-right">{{ __('Name RU') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="name_ru" type="text" class="form-control @error('name_ru') is-invalid @enderror" name="name_ru" value="{{ old('name_ru') }}" required autocomplete="name_ru" autofocus>--}}

{{--                                    @error('name_ru')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">
                                <label for="description_en" class="col-md-4 col-form-label text-md-right">{{ __('Description ') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description_en"  class="form-control @error('description') is-invalid @enderror" name="description"  required autocomplete="description" autofocus></textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
{{--                            <div class="form-group row">--}}
{{--                                <label for="description_hy" class="col-md-4 col-form-label text-md-right">{{ __('Description HY') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <textarea id="description_hy"  class="form-control @error('description_hy') is-invalid @enderror" name="description_hy"  required autocomplete="description_hy" autofocus></textarea>--}}

{{--                                    @error('description_hy')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="description_ru" class="col-md-4 col-form-label text-md-right">{{ __('Description RU') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <textarea id="description_ru"  class="form-control @error('description_ru') is-invalid @enderror" name="description_ru"  required autocomplete="description_ru" autofocus></textarea>--}}

{{--                                    @error('description_ru')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
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
