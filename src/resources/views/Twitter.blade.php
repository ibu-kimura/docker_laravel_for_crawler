@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h4 col aaa">tweet</p>
            <table class="table table-sm table-hover table-striped" style="width:100%; table-layout: fixed;">
                <tr>
                    <th scope="col">一致キーワード</th>
                    <th scope="col">検出日時</th>
                    <th scope="col">ユーザーID</th>
                    <th scope="col">本文</th>
                    <th scope="col">ツイートURL</th>
                    <th scope="col">作品名</th>
                    <th scope="col">女優名</th>
                    <th scope="col">作品情報URL</th>
                    <th scope="col">画像有無</th>
                    <th scope="col">映像有無</th>
                    <th scope="col">ステータス</th>
                    <th scope="col">更新日時</th>
                    <th scope="col">添付ファイル</th>
                    <th scope="col">コメント</th>
                </tr>

                <? foreach($list as $value){ ?>
                    <tr scope='row align-items-center'>
                        <td class='align-middle'>
                            {{ $value->keyword }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->created }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->user_id }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->full_text }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->url }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->works_title }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->works_actress }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->works_url }}
                        </td>
                        <td class='align-middle'>
                            <?=$value->type=='photo' ? '有' : '無' ?>
                        </td>
                        <td class='align-middle'>
                            <?=$value->type=='movie' ? '有' : '無' ?>
                        </td>
                        <td class='align-middle'>
                            {{ $value->deleted }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->updated }}
                        </td>
                        <td class='align-middle'>
                        <? if($value->type=='text'){ ?>
                            無し
                        <? }else{ ?>
                        <a href="#">DL</a>
                        <? } ?>
                        </td>
                        <td class='align-middle'>
                            <form action="/post_Twitter" method="post" class="comment-form">
                                @csrf
                                <input type="hidden" name="tweet_id" value={{$value->tweet_id}}>
                                <textarea name="comment"><?=isset($value->comment) ? $value->comment : ''?></textarea>
                                <button type="submit">更新する</button>
                            </form>    
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
