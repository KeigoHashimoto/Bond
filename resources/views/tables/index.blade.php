@extends('layouts.app')

@section('content')

<div class="main">
    {{-- テーブルが一つもないとき --}}
    @if($tables->isEmpty())
        <p>まだ表がありません</p>
    @else
        <table class="tables-list">
            <thead>
                <tr>
                    <th>title</th>
                    <th>discription</th>
                </tr>
            </thead>
            {{-- テーブルのタイトルと説明文を挿入 --}}
            @foreach($tables as $table)
                <tbody>
                    <tr>
                        <td>{{ link_to_route('table.show',$table->title,[$table->id]) }}</td>
                        <td> 
                            @if (!empty($table->discription))
                                {{ $table->discription }}
                            @else
                                <p>説明はありません</p>
                            @endif
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    @endif

    {{-- テーブル作成フォームがモーダルで表示 --}}
    <div class="table-create" v-show="tableTab ">
        @include('tables.headCreate')
    </div>

    {{-- 表の作成ボタン --}}
    <button v-on:click="tableTab = !tableTab" class="table-add-btn">表を作成</button>

    {{-- モーダル用バックグラウンドフィルター --}}
    <div class="filter" v-show="tableTab" v-on:click="tableTab = !tableTab"></div>

    {{-- グループに戻るボタン --}}
    {{ link_to_route('office.show','グループに戻る',[$office->id],['class'=>'center']) }}
</div>


@endsection