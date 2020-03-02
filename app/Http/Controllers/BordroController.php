<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\ARGBRDMAIL;
use App\Mail\BordroMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

class BordroController extends Controller
{
    public function index()
    {
        ARGBRDMAIL::where('GONDER', 0)
                    ->get()
                    ->each(function ($bordro) {
                        if ($bordro->EPOSTA && (filter_var($bordro->EPOSTA, FILTER_VALIDATE_EMAIL))) {
                            Mail::to($bordro->EPOSTA)
                                    ->send(new BordroMail($bordro));
                        }
                    });
    }

    public function show($id)
    {
        ARGBRDMAIL::where('UID', $id)
                    ->update([
            'OKUNDU' => Carbon::now()->format('Ymd H.i.s'),
            'IP'     => Request::ip(),
            'GONDER' => 1
        ]);

        return Response::download(ARGBRDMAIL::where('UID', $id)->first());
    }
}
