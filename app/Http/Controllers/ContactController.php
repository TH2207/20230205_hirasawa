<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // 初期設定(修正ボタン押下時はフラッシュデータを設定)
        $data = [
            'fname' => $request->session()->get('fname'),
            'gname' => $request->session()->get('gname'),
            'gender' => $request->session()->get('gender'),
            'email' => $request->session()->get('email'),
            'postcode' => $request->session()->get('postcode'),
            'address' => $request->session()->get('address'),
            'building_name' => $request->session()->get('building_name'),
            'opinion' => $request->session()->get('opinion'),
        ];
        return view('index', $data);
    }

    public function confirm(ContactRequest $request)
    {
        // 登録データを保存
        $param = [
            'fname' => $request->fname,
            'gname' => $request->gname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];
        return view('confirm', $param);
    }

    public function register(ContactRequest $request)
    {
        // 登録データをフラッシュデータに保存
        $request->session()->flash('fname', $request->fname);
        $request->session()->flash('gname', $request->gname);
        $request->session()->flash('gender', $request->gender);
        $request->session()->flash('email', $request->email);
        $request->session()->flash('postcode', $request->postcode);
        $request->session()->flash('address', $request->address);
        $request->session()->flash('building_name', $request->building_name);
        $request->session()->flash('opinion', $request->opinion);

        // 修正するボタン押下時は登録画面に戻る
        if ($request->has("back")) {
            return redirect('/');
        }

        // データベースへの登録準備
        $param = [
            'fullname' => $request->fname . ' ' . $request->gname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];

        // データベースへ登録
        $contact = new Contact;
        $contact->fill($param)->save();

        // フラッシュデータ削除
        $request->session()->flush();

        return view('finish');
    }
}
