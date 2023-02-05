@extends('layouts.default')
@section('content')
<div class="common-wrapper">
  <h1 class="common-ttl">お問い合わせ</h1>
  <form method="post" action="/confirm" class="h-adr">
    @csrf
    <table class="common-table">
      <span class="p-country-name" style="display:none;">Japan</span>
      <tr>
        <th class="common-item">お名前<span class="form-textcolor-red"> ※</span></th>
        <td class="common-body">
          <div class="contact-body-name">
            <div class="contact-body-fgname">
              <input type="text" name="fname" class="form-text-name" autocomplete="family-name" value="{{old('fname',$fname)}}" />
              @error('fname')
              <p class="contact-errmsg">{{$message}}</p>
              @enderror
              <p class="form-text-sample">例) 山田</p>
            </div>
            <div class="contact-body-fgname">
              <input type="text" name="gname" class="form-text-name" autocomplete="given-name" value="{{old('gname',$gname)}}" />
              @error('gname')
              <p class="contact-errmsg">{{$message}}</p>
              @enderror
              <p class="form-text-sample">例) 太郎</p>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <th class="common-item">性別<span class="form-textcolor-red"> ※</span></th>
        <td class="common-body">
          @if ($gender == '2')
          <label class="contact-gender">
            <input type="radio" name="gender" value="1">
            <span class="contact-gender-txt">男</span>
          </label>
          <label class="contact-gender">
            <input type="radio" name="gender" value="2" checked>
            <span class="contact-gender-txt">女</span>
          </label>
          @else
          <label class="contact-gender">
            <input type="radio" name="gender" value="1" {{ old('gender') != '2' ? 'checked' : ''}}>
            <span class="contact-gender-txt">男</span>
          </label>
          <label class="contact-gender">
            <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : ''}}>
            <span class="contact-gender-txt">女</span>
          </label>
          @endif
        </td>
      </tr>
      <tr>
        <th class="common-item">メールアドレス<span class="form-textcolor-red"> ※</span></th>
        <td class="common-body">
          <input type="email" name="email" class="form-text" autocomplete="email" value="{{old('email',$email)}}" />
          @error('email')
          <p class="contact-errmsg">{{$message}}</p>
          @enderror
          <p class="form-text-sample">例) test@example.com</p>
        </td>
      </tr>
      <tr>
        <th class="common-item">郵便番号<span class="form-textcolor-red"> ※</span></th>
        <td class="common-body">
          <div class="contact-body-add">
            <p class="contact-body-add-icon">〒</p>
            <input type="text" name="postcode" id="postcode" class="form-text p-postal-code" autocomplete="postal-code" value="{{old('postcode',$postcode)}}">
          </div>
          @error('postcode')
          <p class="contact-errmsg ml30">{{$message}}</p>
          @enderror
          <p class="form-text-sample ml30">例) 123-4567</p>
        </td>
      </tr>
      <tr>
        <th class="common-item">住所<span class="form-textcolor-red"> ※</span></th>
        <td class="common-body">
            <input type="text" name="address" class="form-text p-region p-locality p-street-address" value="{{old('address',$address)}}">
          @error('address')
          <p class="contact-errmsg">{{$message}}</p>
          @enderror
          <p class="form-text-sample">例) 東京都渋谷区千駄ヶ谷1-2-3</p>
        </td>
      </tr>
      <tr>
        <th class="common-item">建物名</th>
        <td class="common-body">
          <input type="text" name="building_name" class="form-text" value="{{old('building_name')}}" />
          <p class="form-text-sample">例) 千駄ヶ谷マンション101</p>
        </td>
      </tr>
      <tr>
        <th class="common-item">ご意見<span class="form-textcolor-red"> ※</span></th>
        <td class="common-body">
          <textarea name="opinion" class="form-text form-textarea">{{old('opinion',$opinion)}}</textarea>
          @error('opinion')
          <p class="contact-errmsg">{{$message}}</p>
          @enderror
        </td>
      </tr>
    </table>
    <button class="common-submit">確認</button>
  </form>
</div>