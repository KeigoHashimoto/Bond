@extends('layouts.app')

@section('content')

<div class="tables-main">
    {{-- テーブルが一つもないとき --}}
    @if($tables->isEmpty())
        <p>まだ表がありません</p>
    @else
        <div class="table-container">
            <table class="tables-list">
                <thead>
                    <tr>
                        <th>TITLE</th>
                        <th>DISCRIPTION</th>
                        <th>DELETE</th>
                        <th>EDIT</th>
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
                            <td>
                                {{ Form::open(['route'=>['table.delete',$table->id],'method'=>'delete']) }}
                                    {{ Form::button('<i class="fas fa-trash"></i>',['class'=>'delete','type'=>'submit']) }}
                                {{ Form::close() }}
                            </td>

                            <td>
                                <a href="{{ route('table.edit',$table->id) }}" class="table-edit-btn"><i class="fas fa-pen"></i></a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>

            {{-- グループに戻るボタン --}}
            {{ link_to_route('office.show','グループに戻る',[$office->id],['class'=>'center']) }}

        </div>
    @endif

</div>

    {{-- モーダル用バックグラウンドフィルター --}}
    <div class="filter" v-show="tableTab" v-on:click="tableTab = false"></div>
    
    {{-- editモーダル用バックグラウンドフィルター --}}
    <div class="filter" v-show="tableEdit" v-on:click="tableEdit = false"></div>

    {{-- 表の作成ボタン --}}
    <button v-on:click="tableTab = !tableTab" class="table-add-btn">表を作成</button>

    {{-- テーブル作成フォームがモーダルで表示 --}}
    <div class="table-create" v-show="tableTab ">
        @include('tables.headCreate')
    </div>

    


@endsection