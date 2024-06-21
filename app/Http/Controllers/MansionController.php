<?php

namespace App\Http\Controllers;

use App\Models\Mansion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MansionController extends Controller
{
    public function index(Request $request) {
        $limit = $request->limit ?? 20;
        $page = $request->page ?? 1;
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

        $query = Mansion::where('address', 'like', "%{$address}%")
        ->whereAny(['title', 'address', 'access', 'note'], 'like', "%{$freeword}%")
        ->where('private', '=', 0);

        $pgnt = \App\MyUtil::pagenation($limit, $query->count(), $page);
        $offset = $pgnt["offset"];

        $mansions = $query
        ->when($order == "latest", function (Builder $query) {
            $query->latest();
        }, function (Builder $query, string $order) {
            $query->when($order == "price", function (Builder $query) {
                $query->orderBy('unit_price');
            }, function (Builder $query) {
                $query->orderBy('unit_price', 'desc');
            });
        })
        ->skip($offset)->take($limit)->get();

        return view('pages.mansions', [
            'pgnt' => $pgnt,
            'mansions' => $mansions
        ]);
    }

    public function show(Mansion $mansion) {
        if ($mansion->private) {
            abort(404);
        }
        return view('pages.mansion', [
            'mansion' => $mansion,
            'mansions' => Mansion::inRandomOrder()->take(3)->get()
        ]);
    }
}
