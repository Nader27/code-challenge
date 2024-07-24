<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

/**
 * @OA\PathItem(path="/api/customers")
 */
class CustomerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/customers",
     *     summary="Get list of customers",
     *     @OA\Response(
     *         response=200,
     *         description="A list of customers",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Customer"))
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
        $customers = Customer::all();
        if ($request->wantsJson()) {
            return $customers;
        }
        return view('customers.index', compact('customers'));
    }


    /**
     * @OA\Post(
     *     path="/api/customers",
     *     summary="Create a new customer",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","email"},
     *             @OA\Property(property="name", type="string", format="text", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Customer created",
     *         @OA\JsonContent(ref="#/components/schemas/Customer")
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
        ]);

        $customer = Customer::create($validated);

        if ($request->wantsJson()) {
            return response()->json($customer, 201);
        }

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/customers/{customer}",
     *     summary="Get a customer by ID",
     *     @OA\Parameter(
     *         name="customer",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Customer data",
     *         @OA\JsonContent(ref="#/components/schemas/Customer")
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
    public function show(Customer $customer, Request $request)
    {
        if ($request->wantsJson()) {
            return $customer;
        }

        return view('customers.show', compact('customer'));
    }

    /**
     * @OA\Put(
     *     path="/api/customers/{customer}",
     *     summary="Update a customer",
     *     @OA\Parameter(
     *         name="customer",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", format="text", example="John Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="john.doe@example.com")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Customer updated",
     *         @OA\JsonContent(ref="#/components/schemas/Customer")
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
    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:customers,email,' . $customer->id,
        ]);

        $customer->update($validated);

        if ($request->wantsJson()) {
            return $customer;
        }

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * @OA\Delete(
     *     path="/api/customers/{customer}",
     *     summary="Delete a customer",
     *     @OA\Parameter(
     *         name="customer",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Customer deleted"
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
    public function destroy(Customer $customer, Request $request)
    {
        $customer->delete();

        if ($request->wantsJson()) {
            return response()->noContent();
        }

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }

    // Web-specific methods
    public function create()
    {
        return view('customers.create');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }
}
