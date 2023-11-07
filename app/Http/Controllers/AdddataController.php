<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdddataController extends Controller
{
    public function dbdata($page_id)
    {
        $page =  Page::findOrFail($page_id);
        return view('data.database', compact('page'));
    }
    public function addhome()
    {
        return view('data.add');
    }

    public function addpage()
    {
        return view('data.datacrud');
    }
    public function adminhome()
    {
        $page =  Page::all();
        return view('welcome', compact('page'));
    }
    public function editpage($page_id)
    {
        $page =  Page::findOrFail($page_id);

        return view('data.editdatacrud', compact('page'));
    }
    public function updatePage(Request $request)
    {
        $p = new Page;
        $p->page_name =  $request->page_name;
        $p->page_path = $request->page_path;
        $p->page_status = $request->input('page_status', 0);
        $p->page_update =  now();
        $p->save();
        return redirect()->route('adminhome')->with('success', 'Table update successfully.');
    }
    public function storePage(Request $request)
    {
        $p = new Page;
        $p->page_name =  $request->page_name;
        $p->page_path = '123';
        $p->page_status = $request->input('page_status', 0);
        $p->page_createdate =  now();
        $p->page_update =  null;
        $p->save();
        return redirect()->route('adminhome')->with('success', 'Table update successfully.');
    }



    public function changeStatus($page_id)
    {
    // ดึงข้อมูลของหน้าจาก $page_id
    $page = Page::find($page_id);

    // ตรวจสอบว่าหน้ามีค่า page_status ที่เป็น 1 หรือ 0
    if ($page) {
        $newStatus = $page->page_status == 1 ? 0 : 1;
        $page->page_status = $newStatus;
        $page->save();
    }

    return response()->json(['message' => 'สถานะถูกเปลี่ยนแปลงเป็น ' . $newStatus]);
    }


    public function pagedatajson()
    {
        $page =  Page::all();
        return response()->json(['page' => $page]);
    }

}
