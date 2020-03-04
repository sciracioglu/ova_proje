<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\ARGBRDMAIL;
use App\Mail\BordroMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BordroController extends Controller
{
    public function index()
    {
        $mailler = DB::connection('personel')->select('SELECT * FROM dbo.ARGBRDMAIL WHERE GONDER = 0');

                    foreach($mailler as $bordro){
                        if ($bordro->EPOSTA && (filter_var($bordro->EPOSTA, FILTER_VALIDATE_EMAIL))) {
                            $uid = (string)$bordro->UID;
                            Mail::to($bordro->EPOSTA)
                                    ->send(new BordroMail($bordro, $uid));
                            ARGBRDMAIL::where('UID', $uid)->update(['GONDER' => 1]);
                        }
                    };
    }

    public function show(string $uid)
    {
        ARGBRDMAIL::where('UID', $uid)
                    ->update([
                        'OKUNDU' => Carbon::now()->format('Y-m-d H:i:s'),
                        'IP' => request()->ip(),
                    ]);

        return response()->make(DB::connection('personel')->select('SELECT * FROM dbo.ARGBRDMAIL WHERE UID = ?', [$uid])[0]->PDF, 200, [
            'Content-Type' => 'application/pdf'
        ]);
    }
}
