<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\Table;
use App\Models\Cell;

class TablesController extends Controller
{
    /**
     * 表のリスト
     *
     * @return void
     */
    public function index($officeId)
    {
        $office = Office::findOrFail($officeId);
        $tables = Table::where('office_id','=',$office->id)->orderBy('id','desc')->get();

        return view('tables.index',compact('office','tables'));
    }

    /**
     * 表の詳細
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $table = Table::findOrFail($id);
        $office= $table->office;
        $cells = Cell::where('table_id','=',$table->id)
        ->orderBy('id')
        ->get();
        return view('tables.show',compact('table','cells','office'));
    }

    /**
     * 表の編集
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
        $table = Table::findOrFail($id);
        return view('tables.edit',compact('table'));
    }

    /**
     * 表の作成
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'title'=>'required|max:100',
            'discription' =>'max:200',
            'head1' => 'max:50',
            'head2' => 'max:50',
            'head3' => 'max:50',
            'head4' => 'max:50',
            'head5' => 'max:50',
        ]);
        
        $office = Office::findOrFail($id);
        $table = new Table();
        $table->office_id = $office->id;
        $table->title = $request->title;
        $table->discription = $request->discription;
        $table->head1 = $request->head1;
        $table->head2 = $request->head2;
        $table->head3 = $request->head3;
        $table->head4 = $request->head4;
        $table->head5 = $request->head5;
        $table->save();

        return redirect('table/'.$office->id.'index');
    }

    /**
     * 表の更新
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required|max:100',
            'discription' =>'max:200',
            'head1' => 'max:50',
            'head2' => 'max:50',
            'head3' => 'max:50',
            'head4' => 'max:50',
            'head5' => 'max:50',
        ]);
        
        $table = Table::findOrFail($id);
        $table->title = $request->title;
        $table->discription = $request->discription;
        $table->head1 = $request->head1;
        $table->head2 = $request->head2;
        $table->head3 = $request->head3;
        $table->head4 = $request->head4;
        $table->head5 = $request->head5;
        $table->save();

        return redirect()->back();
    }

    /**
     * 表の削除
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $table = Table::findOrFail($id);
        $table->delete();
        return redirect()->back();
    }
}
