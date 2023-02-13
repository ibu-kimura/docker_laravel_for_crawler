@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h3 col">★検索結果★</p>
            <p class="h4 col">URLリスト</p>

            <table class="table table-sm table-hover table-striped" style="width:100%; table-layout: fixed;">
            <caption>URL list</caption>
            <tr>
                <th scope="col">検索サイト</th>
                <th scope="col">検索ワード</th>
                <th scope="col">URL</th>
                <th scope="col">検出日</th>
                <th scope="col">
                    <p>ステータス</p>
                    <input id="checkbox_all" type="checkbox" name="bulk_btn" value=""> 全て選択 / 解除
                </th>
                <th scope="col">警告日</th>
                <th scope="col">警告回数</th>
                <th scope="col">巡回日</th>
            </tr>
            </table>
        </div>
    </div>
</div>
@endsection
