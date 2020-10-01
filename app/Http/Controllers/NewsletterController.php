<?php

namespace App\Http\Controllers;

use App\Model\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use MercurySeries\Flashy\Flashy;
use Snowfire\Beautymail\Beautymail;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletter = Newsletter::orderBy('created_at', 'desc')->get();

        $date_view = [
            "data" => $newsletter
        ];
        return view('backend.views.newsletter.list', $date_view);
    }

    public function create()
    {
        return view('backend.views.newsletter.form');
    }

    public function send(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'objet'   => 'required|string',
            'message' => 'required|string',
        ]);
        $mails = Newsletter::get();

        foreach ($mails as $value) {
            $data_mail = [
                "subscribe"   => 0,
                "email"       => $value->email,
                "object"      => $data['objet'],
                "content"     => $data['message'],
                "unsubscribe" => "Vous recevez des e-mails de notifications de Europ'Cos"
            ];
            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('emails.newsletter', $data_mail, function($message) use ($data_mail)
            {
                $message->from("info@europcos.com", "Europ'Cos")
                ->to($data_mail['email'], "")
                ->subject($data_mail['object']);
            });
        }

        Session::flash('success', 'Tous les mails ont été envoyé avec succès');
        return redirect(route('newsletters.index'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        unset($data['_token']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $newsletter = Newsletter::where('email', $data['email'])->first();
        if ($newsletter == null) {
            DB::table('newsletters')->insert($data);
            Flashy::success("Merci pour votr souscription !!!");
            $app_url = config('app.url');

            $data_mail = [
                "subscribe"   => 1,
                "email"       => $data['email'],
                "object"      => "Inscription à la newsletter",
                "message"     => "",
                "unsubscribe" => "Vous recevez des e-mails de notifications de Europ'Cos"
            ];
            $beautymail = app()->make(Beautymail::class);
            $beautymail->send('emails.newsletter', $data_mail, function($message) use ($data_mail)
            {
                $message->from("info@europcos.com", "Europ'Cos")
                ->to($data_mail['email'], "")
                ->subject($data_mail['object']);
            });
        }
        else {
            Flashy::error("Vous avez déjà souscris !!!");
        }

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        $panier = Newsletter::findOrFail($id);
        $panier->delete();

        Session::flash('success', 'Email supprimer avec succès');
        return back();
    }
}
