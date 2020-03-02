<html>
    <style>
		a {
			text-decoration: none;
			background-color: #008CBA; /* Green */
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}
		
		a:link {
			color: white;
			text-decoration: none;
		}
		
		a:visited {
			text-decoration: none;
		}
		
		a:active {
			color: #f6f6f6;
			text-decoration: none;
		}
		
		a:hover {
			text-decoration: none;
		}
		
		body, td, p, ul, ol {
			font-family: Helvetica, Lucida Grande, Arial, sans-serif;
			font-size: 14px;
			line-height: 18px;
			color: #666666;
			text-align: left;
		}
		
		p {
			margin: 2em;
		}
		
		h1 {
			line-height: 145%;
		}
		
		hr {
			border: 0;
			border-top: 1px solid #dddddd;
			margin: 10px 0px 15px 0px;
		}
		
		@media only screen and (max-device-width: 481px) and (min-device-pixel-ratio: 2), only screen and (min-device-width: 481px) and (-webkit-min-device-pixel-ratio: 2) {
			*[id=header] {
				background: url('https://itc-mzstatic-origin.itunes.apple.com/itc/images/email/email-itc-logo@2X.png') no-repeat 0 top;
				-webkit-background-size: 173px 45px;
			}
			
			*[id=hr-fade] {
				background: url('https://itc-mzstatic-origin.itunes.apple.com/itc/images/email/email-hr@2X.png') no-repeat 0 top;
				-webkit-background-size: 648px 18px;
			}
		}
		
		@media only screen and (max-device-width: 480px) {
			
			table[class="table"], td[class="cell"] {
				width: 270px !important;
			}
			
			table[class="table3"], td[class="cell3"] {
				width: 270px !important;
				text-align: left !important;
			}
			
			img[id="header"] {
				width: 135px !important;
				height: 35px !important;
			}
			
			td[id="header"] {
				-webkit-background-size: 135px 35px;
			}
			
			table[class="footer_table"] {
				display: none !important;
			}
			
			.hide {
				max-height: none !important;
				font-size: 11px !important;
				display: block !important;
			}
			
			p {
				text-align: left !important;
				margin: 10px;
			}
			
		}
	</style>
    <body>
            <img src="{{ $message->embed(public_path().'/img/'.$data['sirket'].'.png') }}" height="80" style="height:80px;">
			<hr/>
            <p>
                {!! $data['mesaj'] !!}
            </p>
            <hr />
            <div>
				<div style="display:flex; align-items:center;">
					<img src="{{ $message->embed(public_path().'/img/aragonit.png') }}" style="height:40px;">
				</div>
				<div style="display:flex;">
					© {{ date('Y') }} {{ config('app.name') }}. @lang('Tüm hakları saklıdır.')
				</div>
                 
            </div>
    </body>
</html>
<div>

    
    
