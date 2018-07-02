@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Orders List</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Material name</th>
                                <th>Description</th>
                            </tr>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->material->name }}</td>
                                    <td>{{ $order->material->description }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
