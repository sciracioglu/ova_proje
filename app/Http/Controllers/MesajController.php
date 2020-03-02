<?php

namespace App\Http\Controllers;

use TheSeer\Tokenizer\Exception;
use App\ARGMSJ;
use App\VWABBS;
use App\VWASRK;
use Illuminate\Support\Facades\Mail;
use App\Mail\BilgiMail;
use App\VWABMD;
use App\ARGBYNBS;
use App\ARGBMB;

class MesajController extends Controller
{
    public function index($id,$tip)
    {
        if($tip == 'BS'){
            $data         = VWABBS::where('GUID', $id)->first();
        } else if($tip == 'Bakiye'){
            $data = VWABMD::where('GUID',$id)->first();
        }
        //$firma        = VWASRK::where('SIRKETNO', $data->SIRKETNO)->first();
        return view('mesaj', compact('id', 'data','tip'));
    }

    public function store()
    {
        
        $data = request()->validate([
            'id'    => 'required',
            'mesaj' => 'required',
            'tip' =>'required'
        ]);

        $tip = request('tip');
        try {
            $this->haberVer($tip);
            ARGMSJ::create([
                        'GUID'  => request('id'),
                        'TIPI' => $tip,
                        'MESAJ' => request('mesaj')
                    ]);
            $response['status'] = 1;

        ARGBYNBS::where('GUID', request('id'))
            ->update([
                'ISLEM'       => 2,
                'ISLEMTARIH'  => date('Y-m-d H:i:s')
            ]);


        ARGBMB::where('GUID', request('id'))
            ->update([
                'ISLEM'       => 2,
                'ISLEMTARIH'  => date('Y-m-d H:i:s')
            ]);

        } catch (Exception $e) {
            $response['status'] == -1;
        }

        return $response;
    }

    private function mesajGonderildi($tip)
    {
        if($tip == 'BS'){
            $data           = VWABBS::where('GUID', request('id'))->first();
        }
        else if($tip =='Bakiye'){
            $data           = VWABMD::where('GUID', request('id'))->first();
        }
        $unvan          = $data->UNVAN . ' ' . $data->UNVAN2;
        $email          = $data->EMAIL5;
        $veri['id']     = request('id');
        $veri['sirket'] = $data->SIRKETNO;
        $veri['mesaj']  = request('mesaj') . '<p>' . $unvan . '</p><p><a href="mailto:' . $email . '">' . $email . '</a></p>';

        return $veri;
    }

    private function haberVer($tip)
    {
        $data               = $this->mesajGonderildi($tip);
        $firma              = VWASRK::where('SIRKETNO', $data['sirket'])->first();
        $data['firma_mail'] = $firma->EMAIL;
        if ($firma->EMAIL && (filter_var($firma->EMAIL, FILTER_VALIDATE_EMAIL))){
        Mail::to($firma->EMAIL)
                ->send(new BilgiMail($data));
        }
    }
}
