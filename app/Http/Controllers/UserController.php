<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('table', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function verification()
    {
        return view('verify-email');
    }

    public function verify(Request $request)
    {

        $code = $request->validate([
            'code' => 'required|integer'
        ]);

        $code = (int)$request->code;

        $userv = EmailVerification::where(['user_id' => Auth::user()->id])->first();

        if ((int)$userv->code == $code) {

            $userv->delete();
            $user = User::where('id',Auth::user()->id);
            
            $user->update([
                'email_verified_at' => now()
            ]);
            
            return redirect()->route('dashboard');
        } else {

            return back();
        }
    }



    public function send(Request $request, User $user)
    {
        $data = $request->validate([
            'code' => 'required'
        ]);
        Mail::to($user->email)->send(new SendMail(rand(10000, 100000)));
        return back();
    }
}
