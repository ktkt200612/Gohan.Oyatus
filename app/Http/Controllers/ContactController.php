<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact() //お問い合わせフォーム表示
    {
        
        return view('contact');
    }

    public function contact_confirm(ContactRequest $request) //お問い合わせ内容確認ページへ
    {   
        unset($request['_token']);
        $form = $request->all();
        return view('contact_confirm', ['form' => $form]);
    }

    public function contact_send(Request $request) //お問い合わせ内容登録
    {   
        if ($request->get('action') === 'back') {
            return redirect()->route('contact')->withInput();
        }
        $form = $request->all();
        unset($form['_token']);
        Contact::create($form);
        $request->session()->regenerateToken();
        return view('contact_thanks');
    }

    public function contact_management() //検索ページ表示
    {
        $result = Contact::sortable("id","asc")->paginate(10);
        return view('contact_management', ['forms' => $result]);
    }

    public function contact_search(Request $request) //検索機能
    {
        unset($request['_token']);
        if ($request->gender == '0') {
            if ($request->created_from == null && $request->created_to !== null) {
                $result = Contact::where('name', 'LIKE', "%{$request->name}%")
                ->whereDate('created_at', '<=', "{$request->created_to}")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->sortable("id","asc")->paginate(10);
                return view('contact_management', ['forms' => $result]);
            } elseif ($request->created_from !== null && $request->created_to == null) {
                $result = Contact::where('name', 'LIKE', "%{$request->name}%")
                ->whereDate('created_at', '>=', "{$request->created_from}")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->sortable("id","asc")->paginate(10);
                return view('contact_management', ['forms' => $result]);
            } elseif ($request->created_from == null && $request->created_to == null) {
                $result = Contact::where('name', 'LIKE', "%{$request->name}%")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->sortable("id","asc")->paginate(10);
                return view('contact_management', ['forms' => $result]);
            } else {
                $result = Contact::where('name', 'LIKE', "%{$request->name}%")
                ->whereDate('created_at', '<=', "{$request->created_to}")
                ->whereDate('created_at', '>=', "{$request->created_from}")
                ->where('email', 'LIKE', "%{$request->email}%")
                ->sortable("id","asc")->paginate(10);
                return view('contact_management', ['forms' => $result]);
            }
        }
        if ($request->created_from == null && $request->created_to !== null) {
            $result = Contact::where('name', 'LIKE', "%{$request->name}%")
            ->where('gender', $request->gender)
            ->whereDate('created_at', '<=', "{$request->created_to}")
            ->where('email', 'LIKE', "%{$request->email}%")
            ->sortable("id","asc")->paginate(10);
            return view('contact_management', ['forms' => $result]);
        } elseif ($request->created_from !== null && $request->created_to == null) {
            $result = Contact::where('name', 'LIKE', "%{$request->name}%")
            ->where('gender', $request->gender)
            ->whereDate('created_at', '>=', "{$request->created_from}")
            ->where('email', 'LIKE', "%{$request->email}%")
            ->sortable("id","asc")->paginate(10);
            return view('contact_management', ['forms' => $result]);
        } elseif ($request->created_from == null && $request->created_to == null) {
            $result = Contact::where('name', 'LIKE', "%{$request->name}%")
            ->where('gender', $request->gender)
            ->where('email', 'LIKE', "%{$request->email}%")
            ->sortable("id","asc")->paginate(10);
            return view('contact_management', ['forms' => $result]);
        } else {
            $result = Contact::where('name', 'LIKE', "%{$request->name}%")
            ->where('gender', $request->gender)
            ->whereDate('created_at', '<=', "{$request->created_to}")
            ->whereDate('created_at', '>=', "{$request->created_from}")
            ->where('email', 'LIKE', "%{$request->email}%")
            ->sortable("id","asc")->paginate(10);
            return view('contact_management', ['forms' => $result]);
        }
    }
}
