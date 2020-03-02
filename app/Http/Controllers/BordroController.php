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
                                    ->send(new BordroMail($bordro));
                        }
                    });
    }

    public function show($id)
    {
        ARGBRDMAIL::find($id)
                    ->update([
            'OKUNDU' => Carbon::now()->format('Y-m-d H:i:s'),
            'IP'     => request()->ip(),
            'GONDER' => 1
        ]);

        $filename = ARGBRDMAIL::find($id)->PDF;
        return response()->stream(function () use ($filename) {
            echo file_get_contents($filename);
        }, 200, ['content-type' => 'application/pdf',
        'Cache-Control'         => 'must-revalidate, post-check=0, pre-check=0',
        'Expires'               => '0',
        'Pragma'                => 'public']);
    }
}
