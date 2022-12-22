@extends('layouts.app')

@section('content')
<div class="tables-main">
    <div class="table-container">
        <table class="tables-list">
            <thead>
                <tr>
                    @if (!empty($table->head1 ))
                        <th>{{ $table->head1 }}</th>
                    @else
                        <th></th>
                    @endif
    
                    @if (!empty($table->head2 ))
                        <th>{{ $table->head2 }}</th>
                    @else
                        <th></th>
                    @endif
    
                    @if (!empty($table->head3 ))
                        <th>{{ $table->head3 }}</th>
                    @else
                        <th></th>
                    @endif
    
                    @if (!empty($table->head4 ))
                        <th>{{ $table->head4 }}</th>
                    @else
                        <th></th>
                    @endif
    
                    @if (!empty($table->head5 ))
                        <th>{{ $table->head5 }}</th>
                    @else
                        <th></th>
                    @endif

                </tr>
            </thead>
    
            <tbody>
                @foreach($cells as $cell)
                    <tr>
                        @for($i=1;$i<6;$i++)
                            @if(!empty($cell->{'content'.$i}) || !empty($cell->table->{'head'.$i}))
                                <td>
                                    {{ $cell->{'content'.$i} }}
                                </td>
                            @endif
                        @endfor

                        <td>
                            {{ Form::open(['route'=>['cell.delete',$cell->id],'method'=>'delete']) }}
                                {{ Form::button('<i class="fas fa-trash"></i>',['class'=>'delete','type'=>'submit']) }}
                            {{ Form::close() }}
                        </td>

                        <td>
                            <a href="{{ route('cell.edit',$cell->id,$cell->table->id) }}"  class="table-edit-btn"><i class="fas fa-pen"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- セルの作成フォーム --}}
<div class="table-create" v-show="cellTab ">
    @include('cells.create')
</div>

{{-- セルの作成ボタン --}}
<button v-on:click="cellTab = !cellTab" class="table-add-btn">表の内容を作成</button>


{{-- フィルター --}}
<div class="filter" v-show="cellTab" v-on:click="cellTab = false"></div>

{{-- editフィルター --}}
<div class="filter" v-show="cellEdit" v-on:click="cellEdit = false"></div>

{{ link_to_route('table.index','表一覧に戻る',[$office->id],['class'=>'center']) }}


@endsection