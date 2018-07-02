@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ url('/products/create') }}">Add new</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Products List</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Customer Name</th>
                                <th>Description</th>
                                <th>Materials</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->materialsName() }}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
