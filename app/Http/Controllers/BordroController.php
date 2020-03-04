<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\ARGBRDMAIL;
use App\Mail\BordroMail;
use Carbon\Carbon;

class BordroController extends Controller
{
    public function index()
    {
        ARGBRDMAIL::where('GONDER', 0)
                    ->get()
                    ->each(function ($bordro) {
                        if ($bordro->EPOSTA && (filter_var($bordro->EPOSTA, FILTER_VALIDATE_EMAIL))) {
                            Mail::to($bordro->EPOSTA)
                                    ->send(new BordroMail($bordro, $bordro->UID));
                            $bordro->update(['GONDER' => 1]);
                        }
                    });
    }

    public function show($id)
    {
        ARGBRDMAIL::where('UID', $id)
                    ->update([
                        'OKUNDU' => Carbon::now()->format('Y-m-d H:i:s'),
                        'IP' => request()->ip(),
                    ]);

        return response()->make(ARGBRDMAIL::where('UID', $id)->first()->PDF, 200, [
            'Content-Type' => 'application/pdf'
        ]);
    }
}
