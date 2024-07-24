@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Service Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $service->name }}</h5>
                <p class="card-text">Customer: {{ $service->customer->name }}</p>
                <p class="card-text">Price: ${{ $service->price }}</p>
                <a href="{{ route('services.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
