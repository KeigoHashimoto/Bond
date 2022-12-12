@extends('layouts.app')

@section('content')
<div class="tables-main">
    <table class="tables-list">
        <thead>
            <tr>
                @if (!empty($table->head1 ))
                    <th>{{ $table->head1 }}</th>
                @endif

                @if (!empty($table->head2 ))
                    <th>{{ $table->head2 }}</th>
                @endif

                @if (!empty($table->head3 ))
                    <th>{{ $table->head3 }}</th>
                @endif

                @if (!empty($table->head4 ))
                    <th>{{ $table->head4 }}</th>
                @endif

                @if (!empty($table->head5 ))
                    <th>{{ $table->head5 }}</th>
                @endif
            </tr>
        </thead>

        <tbody>
            {{-- テーブルのヘッドに対応して表示を切り替える --}}
            @foreach($cells as $cell)
                <tr>
                    @if (!empty($table->head1 && $cell->content1))
                        <td>{{ $cell->content1 }}</td>
                    @endif

                    @if (!empty($table->head2 && $cell->content2))
                        <td>{{ $cell->content2 }}</td>
                    @endif

                    @if (!empty($table->head3 && $cell->content3))
                        <td>{{ $cell->content3 }}</td>
                    @endif

                    @if (!empty($table->head4 && $cell->content4))
                        <td>{{ $cell->content4 }}</td>
                    @endif

                    @if (!empty($table->head5 && $cell->content5))
                        <td>{{ $cell->content5 }}</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="table-create" v-show="cellTab ">
    @include('cells.create')
</div>

<button v-on:click="cellTab = !cellTab" class="table-add-btn">表の内容を作成</button>

<div class="filter" v-show="cellTab" v-on:click="cellTab = !cellTab"></div>

{{ link_to_route('table.index','表一覧に戻る',[$office->id],['class'=>'center']) }}


@endsection