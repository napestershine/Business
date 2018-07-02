@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('MaterialController@update', $material->id) }}">
                            {!! csrf_field() !!}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="input-field col s6">
                                <label for="name">Name</label>
                                <input type="text" class="validate" name="name" id="name"
                                       value="{{ $material->name }}" />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s6">
                                <label for="description">Description</label>
                                <textarea class="validate" name="description" id="description" >{{ $material->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field col s6">
                                <label for="code">Code</label>
                                <input type="text" class="validate" name="code" id="code"
                                       value="{{ $material->code }}" />
                                @if ($errors->has('code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field col s6">
                                <label for="price">Price</label>
                                <input type="text" class="validate" name="price" id="price"
                                       value="{{ $material->price }}" />
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-field col s6">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="validate" name="quantity" id="quantity"
                                       value="{{ $material->quantity }}" />
                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>

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
