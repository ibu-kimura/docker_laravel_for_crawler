@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h3 col">検索結果</p>
            <p class="h4 col">週間件数</p>
            <form method="post" action="/post_search">
                @csrf
                <input value={{$param["start_date"]}} type="date" name="start_date">
                <p>~</p>
                <input value={{$param["end_date"]}} type="date" name="end_date">
                <button type="submit">検索</button>
            </form>
            <h3>発見したURLの数:<? isset($param["search_cnt"]) ? $param["search_cnt"] : "" ?></h3>
            <h3>自動警告件数:<? isset($param["auto_alerted"]) ? $param["auto_alerted"] : "" ?></h3>
            <h3>削除確認件数:<? isset($param["deleted"]) ? $param["deleted"] : "" ?></h3>
            <h3>手動警告件数:<? isset($param["manual_alerted"]) ? $param["manual_alerted"] : "" ?></h3>
        </div>
    </div>
</div>
@endsection
