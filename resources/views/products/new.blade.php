@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add new Product</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('ProductController@store') }}">
                            {!! csrf_field() !!}

                            <div class="input-field col s6">
                                <label for="name">Customer Name</label>
                                <input type="text" class="validate" name="name" id="name"
                                       value="{{ $name or old('name') }}"/>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s6">
                                <label for="description">Description</label>
                                <textarea class="validate" name="description"
                                          id="description">{{ $description or old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            @foreach($materials as $material)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="{{ $material->id}}" name="materials[]" value="{{ $material->id }}">
                                    <label class="form-check-label" for="{{ $material->id}}">{{ $material->name }}</label>
                                </div>
                            @endforeach
                            <div class="row">
                                <div class="col m6 s12">
                                    <button type="submit" class="btn btn-primary red">
                                        <i class="fa fa-btn"> Save</i>
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
