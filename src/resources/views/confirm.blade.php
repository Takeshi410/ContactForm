@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="section__title">
        <h2>Confirm</h2>
    </div>

    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
        <table class="confirm-table__inner">
            <tr class="confirm-table__row">
                <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input type="text" name="name" value="{{ $name }}" readonly />
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}"/>
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}"/>
                    </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        <input type="text" name="gender_text" value="{{ $gender_text }}" readonly />
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}"/>
                    </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="text" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="text" name="tel" value="{{ $contact['tel_1'] . $contact['tel_2'] . $contact['tel_3'] }}" readonly />
                    </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        <input type="text" name="category" value="{{ $category }}" readonly />
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly />
                    </td>
            </tr>

            <tr class="confirm-table__row">
                <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input name="detail" value="{{ $contact['detail'] }}" readonly ></input>
                    </td>
            </tr>

        </table>
        </div>
        <div class="form__button">
            <button class="send-form__button-submit" type="submit">送信</button>
            <input type ="button" class="back-form__button-submit" onclick="history.back()" value="修正">
        </div>
    </form>
    </div>
@endsection