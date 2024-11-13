<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmail;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        
        Auth::login($user);

        $code = rand(10000, 100000);

        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MzQwOTU1NTgsImlhdCI6MTczMTUwMzU1OCwicm9sZSI6InRlc3QiLCJzaWduIjoiNjNkZWI2Mzg4NWNjZjZmMzhmYmRlM2U0ZWNiOTQyMGY1YjcyYjU1NGQ0OWIyNDQxOTQ3OGQ3MGY3ZTMwOWQ5YyIsInN1YiI6Ijg5MjEifQ.9gx-zJK7yAdhURXLrWrgURI58NlNX-yQNwLfGlYSiaM";
        
        $data = [
            'mobile_phone' => $user->phone,
            'message' => "This is test from Eskiz",
            'from' => 4546,
            'callback_url' => "http://127.0.0.1:8000/dashboard"
        ];

        $userverify = EmailVerification::where(['user_id' => Auth::user()->id])->first();
        
        if (!$userverify) {

            EmailVerification::create([
                'user_id' => $user->id,
                'code' => $code
            ]);
            SendEmail::dispatch(Auth::user()->email,$code);
            $responce = Http::withToken($token)->post('notify.eskiz.uz/api/message/sms/send',$data);
        }


        return redirect()->route('email.verification');
    }
}
