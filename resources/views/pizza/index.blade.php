@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('All Pizza') }}</div>

                <div class="card-body">
                    @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                    @endif
                    @if(count($pizzas)>0) 
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Small Price</th>
                            <th scope="col">Medium Price</th>
                            <th scope="col">Large Price</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    
                    @foreach($pizzas as $key=> $pizza)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td><img src="{{Storage::url($pizza->image)}}" width="80"></td>
                        <td>{{$pizza->name}}</td>
                        <td>{{$pizza->description}}</td>
                        <td>{{$pizza->category}}</td>
                        <td>{{$pizza->small_pizza_price}}</td>
                        <td>{{$pizza->medium_pizza_price}}</td>
                        <td>{{$pizza->large_pizza_price}}</td>
                        <td><a href="{{route('pizza.edit', $pizza->id)}}"<button class="btn btn-primary">Edit</button></a></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    @endforeach
                    @else 
                    <p>No pizzas</p>

                    @endif
                </table>
                </div>
            </div>
        </div>

@endsection