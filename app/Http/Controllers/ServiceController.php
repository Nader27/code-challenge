<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Customer;
use Illuminate\Http\Request;

/**
 * @OA\PathItem(path="/api/services")
 */
class ServiceController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/services",
     *     summary="Get list of services",
     *     @OA\Response(
     *         response=200,
     *         description="A list of services",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Service"))
     *     ),
     *     @OA\Parameter(
     *         name="Authorization",
     *         in="header",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         description="Bearer token"
     *     )
     * )
     */
    public function index(Request $request)
    {
        $services = Service::all();
        if ($request->wantsJson()) {
            return $services;
        }
        return view('services.index', compact('services'));
    }


    /**
     * @OA\Post(
     *     path="/api/services",
     *     summary="Create a new service",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", format="text", example="New Service")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Service created",
     *         @OA\JsonContent(ref="#/components/schemas/Service")
     *     ),
     *     @OA\Parameter(
     *         name="Authorization",
     *         in="header",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         description="Bearer token"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $service = Service::create($validated);

        if ($request->wantsJson()) {
            return response()->json($service, 201);
        }

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/services/{service}",
     *     summary="Get a service by ID",
     *     @OA\Parameter(
     *         name="service",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Service data",
     *         @OA\JsonContent(ref="#/components/schemas/Service")
     *     ),
     *     @OA\Parameter(
     *         name="Authorization",
     *         in="header",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         description="Bearer token"
     *     )
     * )
     */
    public function show(Service $service, Request $request)
    {
        if ($request->wantsJson()) {
            return $service;
        }

        return view('services.show', compact('service'));
    }

    /**
     * @OA\Put(
     *     path="/api/services/{service}",
     *     summary="Update a service",
     *     @OA\Parameter(
     *         name="service",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", format="text", example="Updated Service")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Service updated",
     *         @OA\JsonContent(ref="#/components/schemas/Service")
     *     ),
     *     @OA\Parameter(
     *         name="Authorization",
     *         in="header",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         description="Bearer token"
     *     )
     * )
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric',
        ]);

        $service->update($validated);

        if ($request->wantsJson()) {
            return $service;
        }

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * @OA\Delete(
     *     path="/api/services/{service}",
     *     summary="Delete a service",
     *     @OA\Parameter(
     *         name="service",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Service deleted"
     *     ),
     *     @OA\Parameter(
     *         name="Authorization",
     *         in="header",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         description="Bearer token"
     *     )
     * )
     */
    public function destroy(Service $service, Request $request)
    {
        $service->delete();

        if ($request->wantsJson()) {
            return response()->noContent();
        }

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }

    // Web-specific methods
    public function create()
    {
        $customers = Customer::all();
        return view('services.create', compact('customers'));
    }

    public function edit(Service $service)
    {
        $customers = Customer::all();
        return view('services.edit', compact('service', 'customers'));
    }
}
