<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Customer",
 *     type="object",
 *     title="Customer",
 *     properties={
 *         @OA\Property(property="id", type="integer", description="ID of the customer"),
 *         @OA\Property(property="name", type="string", description="Name of the customer"),
 *         @OA\Property(property="email", type="string", description="Email of the customer")
 *     }
 * )
 */
class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
