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

    const STATUSES = [
        ['label' => '-- 選択してください --', 'value' => ''],
        ['label' => '新品', 'value' => 1],
        ['label' => '中古品', 'value' => 2],
        ['label' => 'ジャンク品', 'value' => 3]
    ];

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

            $filter_statuses = $this->filter_statuses($search);
            if (!empty($filter_statuses)) {
                foreach ($filter_statuses as $status) {
                    $query->orWhere('status', $status['value']);
                }
            }
        }
        return $query;
    }

    public function filter_statuses($search_word)
    {
        return array_filter(self::STATUSES, function ($v) use ($search_word) {
            $result = mb_strpos($v['label'], $search_word);
            // mb_strpos関数は文字列に一致すれば一致した文字の位置が返る
            // 一致しなければfalse
            return $result !== false;
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
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
