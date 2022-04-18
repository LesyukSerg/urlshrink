<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shortUrls extends Model
{
    use HasFactory;

    protected $table = 'short_urls';
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at', 'date_to'];
    protected $fillable = ['url_original', 'url_short', 'use_count'];

    public static function getLast()
    {
        return shortUrls::select('url_short')
            ->orderBy('id', 'DESC')
            ->value('url_short');
    }

    public static function getOne($short)
    {
        return shortUrls::select('id', 'url_original', 'url_short', 'create_at', 'date_to', 'updated_at', 'use_count')
            ->where('url_short', $short)
            ->first();
    }

    public static function getAll()
    {
        return shortUrls::select('id', 'url_original', 'url_short', 'created_at', 'date_to', 'updated_at', 'use_count')
            ->get();
    }

    public static function insertUrl($url, $short, $hours)
    {
        $dayTo = date("Y-m-d H:i:s", strtotime(now() . " + $hours hours"));

        return shortUrls::insert([
            'url_original' => $url,
            'url_short'    => $short,
            'date_to'      => $dayTo
        ]);
    }

    public static function useIncrement($id)
    {
        return shortUrls::where('id', $id)->increment('use_count');
    }
}
