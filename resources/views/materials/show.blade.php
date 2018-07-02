@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ ucwords($material->name) }}</div>

                    <div class="card-body">
                        <div class="row">
                            <strong>Name</strong>: {{ $material->name }}
                        </div>
                        <div class="row">
                            <strong>Description</strong>: {{ $material->description }}
                        </div>
                        <div class="row">
                            <strong>Code</strong>: {{ $material->code }}
                        </div>
                        <div class="row">
                            <strong>Price</strong>: {{ $material->price }}
                        </div>
                        <div class="row">
                            <strong>Quantity</strong>: {{ $material->quantity }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
