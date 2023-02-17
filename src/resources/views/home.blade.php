@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h3 col">★検索結果★</p>
            <p class="h4 col">URLリスト</p>
            <form method="get" action="./" class="search_condition">
                <div class="search_inner">
                    <p class="h5 col ">絞り込み条件を指定</p>

                    <input type="text" placeholder="ワード検索" name="search_keyword" class="search_word">
                    <p style="display: inline-block;"> または </p>
                    <select name="target_id" class="select_title">
                        <option value="">サイトを選択</option>
                        <option value=0>【すべて表示】</option>
                        <? foreach($target_list as $value){ ?>
                            <option value={{$value->id}}>{{$value->site_name}}</option>
                        <? } ?>
                    </select>
                    <h6>【ステータスを１つ選択】</h6>
                    <div class="statusChange_area">
                        <input type="checkbox" name="status" value="警告" >警告
                        <input type="checkbox" name="status" value="警告不可" >警告不可
                        <input type="checkbox" name="status" value="再警告" >再警告
                        <input type="checkbox" name="status" value="削除済み" >削除済み
                        <input type="checkbox" name="status" value="手動警告" >手動警告
                        <input type="checkbox" name="status" value="" >ステータスなし 
                    </div>
                    <br>
                    <input type="submit" value="絞り込み">
                </div>
            </form>
            <br>
            <form method="post" action="index.php">
                <div class="bulk_form">
                    <p class="h5 col">ステータス一括変更</p>
                    <input class="bulkChangeBtn" type="radio" name="bulk_change" value="選択">選択
                    <input class="bulkChangeBtn" type="radio" name="bulk_change" value="警告不可">警告不可
                    <input class="bulkChangeBtn" type="radio" name="bulk_change" value="削除済み">削除済み
                    <input class="bulkChangeBtn" type="radio" name="bulk_change" value="手動警告">手動警告
                    <input class="bulkChangeBtn" type="radio" name="bulk_change" value="ステータスなし">ステータスなし 
                    <!-- 絞り込み情報受け渡し -->
                    <input type="hidden" name="search_keyword">
                    <input type="hidden" name="target_id">
                    <input type="hidden" name="alert_status">
                    <!-- 絞り込み情報受け渡し -->
                    <input type="submit" value="一括変更">
                    <br>
                </div>
            </form>
            <table class="table table-sm table-hover table-striped" style="width:100%; table-layout: fixed;">
            <caption>URL list</caption>
            <tr>
                <th scope="col">検索サイト</th>
                <th scope="col">検索ワード</th>
                <th scope="col">URL</th>
                <th scope="col">@sortablelink('created','検出日')</th>
                <th scope="col">
                    <p>ステータス</p>
                    <input id="checkbox_all" type="checkbox" name="bulk_btn" value=""> 全て選択 / 解除
                </th>
                <th scope="col">@sortablelink('alerted','警告日')</th>
                <th scope="col">@sortablelink('alert_cnt','警告回数')</th>
                <th scope="col">巡回日</th>
            </tr>
            <? foreach($list as $value){ ?>
                <tr scope='row align-items-center'>
                    <td class='align-middle'>
                        {{ $value->site_name }}
                    </td>
                    <td class='align-middle'>
                        {{ $value->keyword }}
                    </td>
                    <td class='align-middle'>
                        {{ $value->url }}
                    </td>
                    <td class='align-middle'>
                        {{ $value->created }}
                    </td>
                    <td class='align-middle'>
                        {{ $value->status }}
                    </td>
                    <td class='align-middle'>
                        {{ $value->alerted }}
                    </td>
                    <td class='align-middle'>
                        {{ $value->alert_cnt }}
                    </td>
                    <td class='align-middle'>
                        {{ $value->patroled }}
                    </td>
                </tr>
                <? } ?>
            </table>
        </div>
        <div class="d-flex justify-content-center">
        {{ $list->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection
