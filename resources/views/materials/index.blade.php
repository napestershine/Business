@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ url('/materials/create') }}">Add new</a>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Materials List</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Code</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($materials as $material)
                                <tr>
                                    <td>{{ $material->name }}</td>
                                    <td>{{ $material->description }}</td>
                                    <td>{{ $material->code }}</td>
                                    <td>{{ $material->price }}</td>
                                    <td>{{ $material->quantity }}</td>
                                    <td>
                                        <a href="{{ $material->path() }}"
                                           class="btn btn-info">View</a>
                                        <a href="{{ $material->path().'/edit' }}"
                                           class="btn btn-info">Edit</a>
                                        <form action="{{action('MaterialController@destroy', $material->id)}}"
                                              method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $materials->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
