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
        ARGBRDMAIL::find($id)
                    ->update([
            'OKUNDU' => Carbon::now()->format('Y-m-d H:i:s'),
            'IP'     => Request::ip(),
            'GONDER' => 1
        ]);

        $filename = ARGBRDMAIL::find($id)->PDF;
        $fparts   = pathinfo($filename);

        return Response::stream(function () use ($filename) {
            // grab the raw file and echo it out
            echo file_get_contents($filename);
        }, 200, [
            // other headers could be added
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Content-Description' => 'File Download of ' . $fparts['basename'],
            'Content-Disposition' => 'attachment; filename=' . $fparts['basename'],
            'Expires'             => '0',
            'Pragma'              => 'public'
        ]);
    }
}
