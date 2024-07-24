@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Services</h1>
        <a href="{{ route('services.create') }}" class="btn btn-primary">Add Service</a>
        @if ($services->isEmpty())
            <p class="mt-4">No services found.</p>
        @else
            <table class="table mt-4">
                <thead>
                <tr>
                    <th>Customer</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->customer->name }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->price }}</td>
                        <td>
                            <a href="{{ route('services.show', $service->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
