<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'price',
        'status',
        'quantity',
        'detail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $search)
    {
        if ($search !== null) {
            $search_split = mb_convert_kana($search, 's'); //全角スペースを半角
            $search_split2 = preg_split('/[\s]+/', $search_split); //空白で区切る
            foreach ($search_split2 as $value) {
                $query->where('name', 'like', '%' . $value . '%');
                $query->orWhere('detail', 'like', '%' . $value . '%');
                $query->orWhere('id', 'like', '%' . $value . '%');
                $query->orWhere('price', 'like', '%' . $value . '%');
                $query->orWhere('quantity', 'like', '%' . $value . '%');
                $query->orWhere('status', 'like', '%' . $value . '%');

            }

            // $filter_statuses = $this->filter_statuses($search);
            // if (!empty($filter_statuses)) {
            //     foreach ($filter_statuses as $status) {
            //         $query->orWhere('status', $status['value']);
            //     }
            // }
        }
        return $query;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
