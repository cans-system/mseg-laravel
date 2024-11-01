<?php

namespace App\Http\Controllers;

use App\Models\Mansion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MansionController extends Controller
{
    public function index(Request $request) {
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
            ->where('private', '=', 0)
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
            ->withQueryString();

        return view('pages.mansions', [
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
