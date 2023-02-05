<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected $fillable = ['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion'];

    public static function doSearch($fullname, $gender, $created_at_start, $created_at_end, $email) {

        // 検索クエリ準備
        $query = self::query();

        // 検索条件：お名前
        if (!empty($fullname)) {
            $query->orwhere('fullname', 'like', '%' . $fullname . '%');
        }

        // 検索条件：性別
        if ($gender != '0') {
            $query->orwhere('gender', '=', $gender);
        }

        // 検索条件：登録日
        if (!empty($created_at_start) && !empty($created_at_end)) {
            $query->orwhereBetween('created_at', [$created_at_start, $created_at_end]);
        } elseif (!empty($created_at_end)) {
            $query->orwhere('created_at', '<', $created_at_end);
        } elseif (!empty($created_at_start)) {
            $query->orwhere('created_at', '>', $created_at_start);
        }

        // 検索条件：メールアドレス
        if (!empty($email)) {
            $query->orwhere('email', 'like', '%' . $email . '%');
        }

        // 検索(ページネーション)
        $results = $query->paginate(10);
        return $results;
    }
}
