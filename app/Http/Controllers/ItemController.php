<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Exports\ItemsExport;
use App\Imports\ItemsImport;
use Illuminate\Support\Facades\Artisan;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $items = Item::get();
        return view('items', compact('items'));
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new ItemsExport, 'items.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        $file = request()->file('file');
        if (!$file) {
            flash()->addError('File is require !!!');
            return back()->with('message', 'File is require');
        }
        Excel::import(new ItemsImport, $file);
        flash()->addSuccess('Add data success !');
        return back();
    }

    public function clear(){
        Artisan::call('migrate:fresh');

        flash()->addSuccess('Clear data success !');
        return back();
    }
}
