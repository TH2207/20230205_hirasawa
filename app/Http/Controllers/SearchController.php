<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // 初期設定
        $param = [
            'fullname' => '',
            'gender' => '0',
            'created_at_start' => '',
            'created_at_end' => '',
            'email' => '',
        ];

        return view('search.index', $param);
    }

    public function search(Request $request)
    {
        // リセットボタン押下時は初期設定にする
        if ($request->has("reset")) {

            // フラッシュデータ削除
            return redirect('/find');
        }

        // 検索条件設定
        $fullname = $request->fullname;
        $gender = $request->gender;
        $created_at_start = $request->created_at_start;
        $created_at_end = $request->created_at_end;
        $email = $request->email;

        $contacts = Contact::doSearch($fullname, $gender, $created_at_start, $created_at_end, $email);

        // 検索結果と検索条件を設定
        $param = [
            'contacts' => $contacts,
            'fullname' => $fullname,
            'gender' => $gender,
            'created_at_start' => $created_at_start,
            'created_at_end' => $created_at_end,
            'email' => $email,
        ];

        return view('search.index', $param);
    }

    public function delete(Request $request)
    {
        // データ削除
        $contact = Contact::find($request->id);
        $contact->delete();

        // 検索条件設定
        $fullname = $request->fullname;
        $gender = $request->gender;
        $created_at_start = $request->created_at_start;
        $created_at_end = $request->created_at_end;
        $email = $request->email;

        // 削除後に再検索
        return redirect()->route('find.search', ['fullname' => $fullname, 'gender' => $gender, 'created_at_start' => $created_at_start, 'created_at_end' => $created_at_end, 'email' => $email,]);
    }
}
