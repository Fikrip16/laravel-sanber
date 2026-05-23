<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    public function showregister(){
        return view('auth.register');
    }
    public function registeruser(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
            ]);
           $userCount =User::count();

           $user = new User;
           $user->name =$request->input('name');
           $user->email =$request->input('email');
           $user->password = Hash::make($request->input('password'));
           $user->role = $userCount === 0 ? 'admin' : 'user';

           $user->save();
           return redirect('/')->with('success', 'Register berhasil');
        }
        public function showlogin(){
            return view('auth.login');
            
        }
        public function login(Request $request){
            
            $credentials = $request->only('email', 'password');
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
         
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                $loggedInUser = Auth::user();
                Log::info('Password baru disimpan untuk user: ' . $loggedInUser->email);
                Log::info('Password hash: ' . $loggedInUser->password);
                return redirect('/')->with('success', 'Login berhasil');
            }
                
            
            return back()->withErrors([
                'email' => 'Email atau password tidak cocok.',
            ])->onlyInput('email');
    
}
         public function logout(Request $request){
            Auth::logout();
 
            $request->session()->invalidate();
         
            $request->session()->regenerateToken();
         
            return redirect('/')->with('success', 'Logout berhasil');
        }
        public function getprofile(){
            $userAuth = Auth::User()->profile;

            $userId= Auth::id();

            $profileData = Profile::where('user_id',$userId)->first();

            if($userAuth){
                return view("profile.edit", ["profile" => $profileData]);
            }else{
                return view("profile.create");

}
        }
        public function createprofile(Request $request){
            $request->validate([
                'age' => 'required|numeric',
                'address' => 'required|min:5',
                ]);
           $userId= Auth::id();

           $profile = new profile;
           $profile->age =$request->input('age');
           $profile->address =$request->input('address');
            $profile->user_id = $userId;

           $profile->save();
           return redirect('/profile');
        }

        public function updateProfile(Request $request, $id){
            $request->validate([
                'age' => 'required|numeric',
                'address' => 'required|min:5',
                ]);
  
           $profile = Profile::find($id);
           $profile->age =$request->input('age');
           $profile->address =$request->input('address');
    

           $profile->save();
           return redirect('/profile')->with('success', 'Update Profile Berhasil');
        }

      
        public function resetPassword(Request $request)
        {
            Log::info('Masuk ke resetPassword()');
        
            $request->validate([
                'password' => 'required|min:8|confirmed',
            ]);
        
            $email = session('otp_email'); // ✅ PAKAI INI!
            Log::info('Email dari session: ' . $email);
        
            $user = User::where('email', $email)->first();
        
            if ($user) {
                Log::info('User ditemukan: ' . $user->email);
        
                $user->password = Hash::make($request->password);
                $user->save();
        
                Log::info('Password berhasil diupdate untuk: ' . $user->email);
        
                Session::forget(['otp', 'otp_email', 'otp_expired']); // ✅ clear semua
        
                return redirect('/login')->with('success', 'Password berhasil direset!');
            }
        
            Log::warning('User tidak ditemukan: ' . $email);
            return back()->with('error', 'Email tidak ditemukan.');
        }
        

        public function verifyotp(Request $request)
        {
            $request->validate([
                'otp' => 'required',
            ]);
        
            $email = session('otp_email');
            $user = User::where('email', $email)->first();
        
            if (!$user) {
                return back()->withErrors(['email' => 'Email tidak ditemukan']);
            }
            session(['otp_verified' => true]);
            if (session('otp') != $request->otp) {
                return back()->withErrors(['otp' => 'Kode OTP salah']);
            }
        
            
        
            return redirect()->route('reset-password-form');
        }
        
        
public function showForgotForm() {
    return view('auth.forgot-password');
}
public function showOtpForm(Request $request)
{
    return view('auth.verify-otp', ['email' => session('otp_email')]);
}
public function showResetForm()
{
    
    if (!session('otp_verified')) {
        return redirect()->route('verify-otp.form')->with('error', 'Silakan verifikasi OTP dulu.');
    }

    $email = session('otp_email');
    return view('auth.reset-password', compact('email'));
}



public function sendOtp(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $otp = rand(100000, 999999);
    Session::put('otp', $otp);
    Session::put('otp_expired', now()->addMinutes(5));
    Session::put('otp_email', $request->email);

    // Sebelumnya mungkin tampilkan OTP langsung di browser
    // return view('auth.verify', compact('otp'));

    // Sekarang kita ubah jadi kirim via email:
    Mail::to($request->email)->send(new OtpMail($otp));

    return redirect('/verify-otp')->with('success', 'Kode OTP telah dikirim ke email.');
}
}
