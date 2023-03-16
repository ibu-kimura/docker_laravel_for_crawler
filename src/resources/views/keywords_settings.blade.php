@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h3 col">★キーワードを指定する★</p>
            <p class="h4 col">キーワードの追加</p>
            <form action="/post_keywords_settings" method="post" class="comment-form">
                @csrf
                <select name="target_type">
                    <option value=1>WEBSITE</option>
                    <option value=2>Twitter</option>
                    <option value=3>Google</option>
                </select>
                <select name="works_id">
                    <option value="">品番：女優名</option>
                    @foreach($works as $work){
                        <option value={{$work->id}}>{{$work->code}}:{{$work->actress}}</option>
                    @endforeach
                </select>
                <input type="text" name="keyword">
                <button type="submit">追加する</button>
            </form>
            <p class="h4 col">キーワードリスト</p>
            <table class="table table-sm table-hover table-striped" style="width:100%; table-layout: fixed;">
                <caption>Keyword List</caption>
                <tr>
                    <th scope="col">対象</th>
                    <th scope="col">検索ワード</th>
                    <th scope="col">設定日</th>
                    <th scope="col">巡回日</th>
                </tr>
                @foreach($list as $value)
                <tr scope='row align-items-center'>
                    <td class='align-middle'>
                        @if($value->target_type==1)
                        WEBSITE
                        @elseif($value->target_type=-2)
                        Twitter
                        @else
                        Google
                        @endif
                    </td>
                    <td class='align-middle'>
                        {{ $value->keyword }}
                    </td>
                    <td class='align-middle'>
                        {{ $value->created }}
                    </td>
                    <td class='align-middle'>
                        {{ $value->searched }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-center">
        {{ $list->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection
