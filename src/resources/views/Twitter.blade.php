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
                            {{ $value->type }}
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
                            {{ $value->type }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->type }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->deleted }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->updated }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->type }}
                        </td>
                        <td class='align-middle'>
                            {{ $value->comment }}
                        </td>
                    </tr>
                    <? } ?>
            </table>
        </div>
    </div>
</div>
@endsection
