<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class People extends Model
{
    use HasFactory;

    protected $table = 'people';
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
        'height',
        'mass',
        'hair_color',
        'skin_color',
        'eye_color',
        'gender',
        'homeworld',
        'url',
        'homeworld',
        'films',
        'vehicles',
        
    ];

    public function getPeople($offset = null , $limit = null, $name = null){
        $query = DB::table('people');
        
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
