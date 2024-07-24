<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     schema="Service",
 *     type="object",
 *     title="Service",
 *     properties={
 *         @OA\Property(property="id", type="integer", description="ID of the service"),
 *         @OA\Property(property="name", type="string", description="Name of the service")
 *     }
 * )
 */
class Service extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'name', 'price'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
