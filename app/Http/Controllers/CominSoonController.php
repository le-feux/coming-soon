<?php

namespace App\Http\Controllers;

use App\Model\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use MercurySeries\Flashy\Flashy;
use Snowfire\Beautymail\Beautymail;

class CominSoonController extends Controller
{
    private $subscribe = false;

    public function index()
    {
        $data = ['subscribe' => $this->subscribe];
        return view('welcome', $data);
    }

    public function subscribe(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        unset($data['_token']);
        unset($data['submit']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $newsletter = Newsletter::where('email', $data['email'])->first();
        if ($newsletter == null) {
            DB::table('newsletters')->insert($data);
            Flashy::success("Merci pour votre inscription !!!");
            $app_url = config('app.url');

            $data_mail = [
                "subscribe"   => 1,
                "email"       => $data['email'],
                "object"      => "Inscription au lancement de Europ'Cos",
                "message"     => "",
                "unsubscribe" => "Vous recevez des e-mails de notifications de Europ'Cos"
            ];
            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('emails.subscribe', $data_mail, function($message) use ($data_mail)
            {
                $message->from("info@europcos.com", "Europ'Cos")
                ->to($data_mail['email'], "")
                ->subject($data_mail['object']);
            });

            $this->subscribe = true;
            $data = ['subscribe' => $this->subscribe];
            return view('welcome', $data);
        }
        else {
            Flashy::error("Vous êtes déjà inscris !!!");
        }

        return back();
    }
}
