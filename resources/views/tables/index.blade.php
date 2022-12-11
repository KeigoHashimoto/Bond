@extends('layouts.app')

@section('content')

<div class="main">
    @if($tables->isEmpty())
        <p>まだ表がありません</p>
    @else
        @foreach($tables as $table)<a></a>
            <div class="tables-list">
                <ul>
                    <li>{{ link_to_route('table.show',$table->title,[$table->id]) }}:
                        @if(!empty($table->discription))
                            {{ $table->discription }}
                        @else
                            <p>説明はありません</p>
                        @endif
                    </li>
                </ul>
            </div>
        @endforeach
    @endif

    <div class="table-create" v-show="tableTab ">
        @include('tables.headCreate')
    </div>

    <button v-on:click="tableTab = !tableTab" class="table-add-btn">表を作成</button>

    <div class="filter" v-show="tableTab" v-on:click="tableTab = !tableTab"></div>
</div>


@endsection