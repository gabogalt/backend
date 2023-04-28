<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vehicles extends Model
{
    use HasFactory;

    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $connection = 'mysql';
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'model',
        'manufacturer',
        'cost_in_credits',
        'length',
        'max_atmosphering_speed',
        'crew',
        'passengers',
        'cargo_capacity',
        'consumables',
        'vehicle_class',
        'create_at',
        'pilots',
        'films',
        'url',
    ];

    public function getVehicles($offset = null , $limit = null, $name = null){
       
        $query = DB::table('vehicles');

        if($limit != null){
            $query->limit($limit);
        }

        if($offset != null && $limit!=null){
            $query->offset($offset);
        }

        if($name != null){
            $query->where('name', 'LIKE', '%'.$name.'%');
        }

        return $query->get();
    }
}
