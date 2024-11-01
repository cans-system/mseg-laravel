<?php

namespace App\Http\Controllers;

use App\Models\Mansion;
use App\MyUtil;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AdminMansionController extends Controller
{
    function index(Request $request) {        
        $pageSize = $request->query('pageSize') ?? 20;

        $order = $request->order ?? 'latest';
        $address = $request->address ?? null;
        if ($address !== null) {
            $address = mb_convert_kana($address, 'ASKV');
            $pattern = ['丁目'];
            $replace = ['－'];
            $address = str_replace($pattern, $replace, $address);
            $pattern = ['ー'];
            $replace = ['－'];
            $address = str_replace($pattern, $replace, $address);
        }
        $freeword = $request->freeword ?? null;
        if ($freeword !== null) {
            $freeword = mb_convert_kana($freeword, 'ASKV');
        }

        $mansions = Mansion::where('address', 'like', "%{$address}%")
            ->whereAny(['title', 'address', 'access', 'note'], 'like', "%{$freeword}%")
            ->when($order == "latest", function (Builder $query) {
                $query->latest();
            }, function (Builder $query) use ($order) {
                $query->when($order == "price", function (Builder $query) {
                    $query->orderBy('unit_price');
                }, function (Builder $query) {
                    $query->orderBy('unit_price', 'desc');
                });
            })
            ->paginate($pageSize)
            ->withQueryString();;

        return view('pages.admin.mansions', [
            'mansions' => $mansions
        ]);
    }
      
    function create() {      
        # 初期値の指定
        $mansion = new Mansion();
        $mansion->birthday = new Carbon();
        $mansion->birthday_set = 0;
        $mansion->private = 0;
        
        return view('pages.admin.mansionCreate', [
            'mansion' => $mansion
        ]);
    }
      
    function store(Request $request) {     
        $request->validate([
            'title' => 'required',
            'unit_price' => 'required',
            'address' => 'required',
            'access' => 'required'
        ]); 
      
        $mansion = new Mansion();
        $mansion->title = $request->title;
        $mansion->unit_price = $request->integer('unit_price');
        $mansion->comment = $request->comment;
        $mansion->address = $request->address;
        $mansion->access = $request->access;
        $mansion->total_units = $request->integer('total_units');
        $mansion->birthday = $request->birthday."-01";
        $mansion->birthday_set = $request->birthday_set;
        $mansion->floors = $request->float('floors');
        $mansion->architecture = $request->string('architecture');
        $mansion->note = $request->note;
        $mansion->private = $request->private;
        $mansion->save();
      
        return redirect("/admin/mansions/{$mansion->id}/edit");
    }
    
    public function edit(Mansion $mansion) {
        return view('pages.admin.mansionEdit', [
            'mansion' => $mansion
        ]);
    }
      
    public function update(Request $request, Mansion $mansion) {    
        $request->validate([
            'title' => 'required',
            'unit_price' => 'required',
            'address' => 'required',
            'access' => 'required'
        ]);

        $mansion->title = $request->title;
        $mansion->unit_price = $request->unit_price;
        $mansion->comment = $request->comment;
        $mansion->address = $request->address;
        $mansion->access = $request->access;
        $mansion->total_units = $request->total_units;
        $mansion->birthday = $request->birthday."-01";
        $mansion->birthday_set = $request->birthday_set;
        $mansion->floors = $request->floors;
        $mansion->architecture = $request->architecture;
        $mansion->note = $request->note;
        $mansion->private = $request->private;
        $mansion->save();

        return back()->with('toast', ['success', "{$mansion->title}を更新しました"]);
    }
      
    public function destroy(Mansion $mansion) {      
        $mansion->delete();
      
        return back()->with('toast', ['success', "{$mansion->title}を削除しました"]);
    }

    public function image (Request $request, Mansion $mansion) {
        $mansion->image = $request->hasFile('image')
        ? MyUtil::thumbnail($request->file('image')->store('img'))
        : null;
        $mansion->save();

        return back()->with('toast', ['success', "{$mansion->title}を更新しました"]);

    }
}
