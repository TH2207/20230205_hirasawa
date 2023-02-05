@extends('layouts.default_search')
@section('content')
<div class="search">
  <h1 class="search-ttl">管理システム</h1>
  <div class="search-wrapper">
    <form method="post" action="/find/search">
      @csrf
      <table class="search-table">
        <tr>
          <th class="search-item">お名前</th>
          <td class="search-body">
            <div class="search-body-text">
              <input type="text" name="fullname" class="form-text" autocomplete="family-name" value="{{$fullname}}" />
            </div>
          </td>
        </tr>
        <tr>
          <th class="search-item">性別</th>
          <td class="search-body">
            <label for="" class="contact-gender">
              <input type="radio" name="gender" value="0" {{ $gender == '0' || $gender == '' ? 'checked' : ''}}>
              <span class="contact-gender-txt">全て</span>
            </label>
            <label for="" class="contact-gender">
              <input type="radio" name="gender" value="1" {{ $gender == '1' ? 'checked' : ''}}>
              <span class="contact-gender-txt">男</span>
            </label>
            <label for="" class="contact-gender">
              <input type="radio" name="gender" value="2" {{ $gender == '2' ? 'checked' : ''}}>
              <span class="contact-gender-txt">女</span>
            </label>
          </td>
        </tr>
        <tr>
          <th class="search-item">登録日</th>
          <td class="search-body">
            <div class="search-body-calendar">
              <div class="search-body-text">
                <input type="date" name="created_at_start" class="form-text" autocomplete="family-name" value="{{$created_at_start}}" />
              </div>
              <p class="search-body-tilde">〜</p>
              <div class="search-body-text">
                <input type="date" name="created_at_end" class="form-text" autocomplete="family-name" value="{{$created_at_end}}" />
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <th class="search-item">メールアドレス</th>
          <td class="search-body">
            <div class="search-body-text">
              <input type="text" name="email" class="form-text" autocomplete="family-name" value="{{$email}}" />
            </div>
          </td>
        </tr>
      </table>
      <button class="search-submit" name="finish">検索</button>
      <button class="search-reset" name="reset">リセット</button>
    </form>
  </div>
  @isset ($contacts)
  <div class="search-result">
    {{ $contacts->appends(['fullname'=>$fullname,'gender'=>$gender,'created_at_start'=>$created_at_start,'created_at_end'=>$created_at_end,'email'=>$email])->links('vendor.pagination.tailwind') }}
    <table class="search-result-table">
      <tr>
        <th class="search-result-th width3">ID</th>
        <th class="search-result-th">お名前</th>
        <th class="search-result-th width3">性別</th>
        <th class="search-result-th width25">メールアドレス</th>
        <th class="search-result-th width40">ご意見</th>
        <th class="search-result-th width8"></th>
      </tr>
      @foreach ($contacts as $contact)
      <tr>
        <td class="search-result-td">{{$contact->id}}</td>
        <td class="search-result-td">{{$contact->fullname}}</td>
        <td class="search-result-td">{{$contact->gender == '1' ? '男性' : '女性'}}</td>
        <td class="search-result-td">{{$contact->email}}</td>
        <td class="search-result-td search-opinion">{{$contact->opinion}}</td>
        <td class="search-result-td">
          <form method="post" action="{{ route('find.delete', ['id' => $contact->id,'fullname'=>$fullname,'gender'=>$gender,'created_at_start'=>$created_at_start,'created_at_end'=>$created_at_end,'email'=>$email]) }}">
            @csrf
            <button class="search-delete" name="delete">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  @endisset
</div>