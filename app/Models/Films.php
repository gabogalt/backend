<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Films extends Model
{
    use HasFactory;

    protected $table = 'films';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $connection = 'mysql';
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'opening_crawl',
        'director',
        'producer',
        'release_date',
        'characters',
        'vehicles',
        'url',
        'create_at',
        'update_at',
        
    ];

    public function getFilms($offset = null , $limit = null, $title= null){
        $query = DB::table('films');

        if($limit != null){
            $query->limit($limit);
        }

        if($offset != null && $limit!=null){
            $query->offset($offset);
        }

        if($title != null){
            $query->where('title', 'LIKE', '%'.$title.'%');
        }

        return $query->get();
    }
}
