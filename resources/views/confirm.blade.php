@extends('layouts.default')
@section('content')
<div class="common-wrapper">
  <h1 class="common-ttl">内容確認</h1>
  <form method="post" action="{{ route('register',['fname' => $fname, 'gname' => $gname, 'gender' => $gender, 'email' => $email, 'postcode' => $postcode, 'address' => $address, 'building_name' => $building_name, 'opinion' => $opinion]) }}">
    @csrf
    <table class="common-table">
      <tr>
        <th class="common-item">お名前</th>
        <td class="common-body">
          <p>{{$fname}} {{$gname}}</p>
        </td>
      </tr>
      <tr>
        <th class="common-item">性別</th>
        <td class="common-body">
          @if ($gender=='2')
          <p>女性</p>
          @else
          <p>男性</p>
          @endif
        </td>
      </tr>
      <tr>
        <th class="common-item">メールアドレス</th>
        <td class="common-body">
          <p>{{$email}}</p>
        </td>
      </tr>
      <tr>
        <th class="common-item">郵便番号</th>
        <td class="common-body">
          <p>{{$postcode}}</p>
        </td>
      </tr>
      <tr>
        <th class="common-item">住所</th>
        <td class="common-body">
          <p>{{$address}}</p>
        </td>
      </tr>
      <tr>
        <th class="common-item">建物名</th>
        <td class="common-body">
          <p>{{$building_name}}</p>
        </td>
      </tr>
      <tr>
        <th class="common-item">ご意見</th>
        <td class="common-body">
          <p>{{$opinion}}</p>
        </td>
      </tr>
    </table>
    <button class="common-submit" name="finish">送信</button>
    <button class="confirm-back" name="back">修正する</button>
  </form>
</div>