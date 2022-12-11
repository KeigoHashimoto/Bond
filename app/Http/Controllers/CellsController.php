<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cell;
use App\Models\Table;

class CellsController extends Controller
{
    public function store(Request $request,$id){
        $request->validate([
            'content1' => 'max:300',
            'content2' => 'max:300',
            'content3' => 'max:300',
            'content4' => 'max:300',
            'content5' => 'max:300',
        ]);

        $table=Table::findOrFail($id);
        $cell = new Cell();
        $cell->table_id = $table->id;
        $cell->content1 = $request->content1;
        $cell->content2 = $request->content2;
        $cell->content3 = $request->content3;
        $cell->content4 = $request->content4;
        $cell->content5 = $request->content5;
        $cell->save();

        return redirect()->back();
    }
}
