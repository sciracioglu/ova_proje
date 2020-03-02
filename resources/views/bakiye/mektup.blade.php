<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
	* {
		font-family: DejaVu Sans;
		font-size: 13px;
	}
    
    .page-break {
    page-break-after: always;
    }
    table{
        width: auto;
    }
    td{
        padding: 3px;
    }
    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-center: left;
        
    }
    hr{
        margin:2px 0;
        border:1px solid black;
    }
    
</style>

<img src="http://95.9.95.54:84/img/{{$data->SIRKETNO }}.png" style="height:54px"  />

<div>
    <div>
        <hr>
        <p>Sayın, {{ $data->KARTKOD}} <br> {{ $data->UNVAN }}</p>
        
        <h6><u>Özü : Hesap Bakiyeniz hakkında</u></h6>

    </div>
    <div style="margin-top:50px">
        <p>
        Şirketimizdeki cari hesabınız <b>{{ $data->RAPORTARIH }}</b> tarihi itibariyle 
        <b>{{ number_format($data->BAKIYE,2,',','.') }} TL</b>
        </p>
        <p>
            Borç bakiyesi vermektedir.
        </p>
        <p>
            Mutakıp olup olmadığınızı bildirmenizi rica ederiz.
        </p>
        <p>
            Saygılarımızla,
        </p >
    </div>
    <div>
        <h6><u>HESAP MUTABAKATI HAKKINDA</u></h6>
        
        <p>
            Nezdinizdeki hesap durumunuzun .............. tarihindeki ................. TL bakiye ile mutabık olduğumuzu
            / mutabık olmadığımızı teyid ederiz.
        </p>
        <p>
            Saygılarımızla,
        </p>
        <p>
            (KAŞE / İMZA)

        </p>
        <p>
            {{ $data->UNVAN }}
        </p>
    </div>
    <div style="margin-top:30px">
        <h4><u>HATA VE UNUTMA MÜSTESNASIDIR</u></h4>
            <p><b>Not:</b>
                <ol>
                    <li>
                        Mutabakat veya itirazınızı bir ay içinde bildirmediğiniz takdirde T.T.K. nun 92. 
                        Maddesi gereğince bakiyede mutabık sayılacağınızı hatırlatırız.
                    </li>
                    <li>
                        Bakiyede mutabık olmadığınız takdirde, bir hesap ekstrenizi gönderilmesini rica ederiz.
                    </li>
                
                </ol>
            </p>
        <h6><u>MUTABAKAT İÇİN</u></h6>
        <p>
            <table>
                <tr>
                    <td>Telefon</td>
                    <td>:</td>
                    <td>(332) 324 0389</td>
                </tr>
                <tr>
                    <td>Faks</td>
                    <td>:</td>
                    <td>(332) 324 0395</td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>:</td>
                    <td>ozguroz@ovaun.com.tr<br>ovaun@ovaun.com.tr</td>
                </tr>
            </table>
        </p>
    </div>

    
</div>
