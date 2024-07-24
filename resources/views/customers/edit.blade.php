@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Customer</h1>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
