<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendeur;
use App\Document;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordCodeMail;
use App\Mail\PasswordResetValidationMail;

class VendeurController extends Controller
{

    public function __construct() {
        $this->middleware('check.session')->only(['updateProfileForm', 'updateProfile', 'index', 'logout']);
    }

    public function loginForm() {
        return view('sellers.login');
    }

    public function login(Request $request) {
        
        $request->validate([
            'email' => 'required|exists:vendeurs,email',
            'password' => 'required'
        ],
        [
            'email.required' => 'Veuillez renseigner votre email',
            'email.exists' => 'Cet email est inexistant',
            'password' => 'Veuillez renseigner votre mot de passe'
        ]);

        $email_password = Vendeur::where('email', $request->input('email'))->value('password');

        if (Hash::check($request->input('password'), $email_password)) {
            $user = Vendeur::where('email', $request->input('email'))->firstOrFail();
            session()->put('id', $user->id);
            session()->put('nom', $user->username);
            session()->put('profile', $user->profile);
            session()->put('wallet', $user->wallet);
            return redirect(route('sellers.home'));
        } else {
            return back()->with('error', 'Mot de passe incorrect');
        }
    }

    public function registrationForm() {
        $registrationForm = true;
        return view('sellers.register', compact('registrationForm'));
    }

    public function register(Request $request) {

        $request->validate([
            'username' => 'required|string',
            'email' => 'required|unique:vendeurs,email',
            'password' => 'required|confirmed'
        ],
        [
            'username.required' => 'Veuillez renseigner votre nom',
            'username.string' => 'Votre nom n\'est pas une chaîne de caractères',
            'email.required' => 'Veuillez renseigner votre email',
            'email.unique' => 'Email déjà utilisé',
            'password.required' => 'Veuillez renseigner votre mot de passe',
            'password.confirmed' => 'Les deux mot de passe ne sont pas identiques'
        ]);

        $seller = Vendeur::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'wallet' => 0
        ]);

        session()->put('id', $seller->id);
        session()->put('nom', $seller->username);
        session()->put('profile', $seller->profile);
        session()->put('wallet', $seller->wallet);

        return redirect(route('sellers.home'))->with('new-seller', 'Bienvenue, '.$seller->username.', nous sommes ravis de vous avoir parmi nous');
    }

    public function updateProfileForm() {
        $vendeur = Vendeur::where('id', session()->get('id'))->first();
        return view('sellers.profile', compact('vendeur'));
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'username' => 'required',
            'profile' => 'sometimes|file|image'
        ],
        [
            'username.required' => 'Veuillez renseigner votre nom',
            'profile.file' => 'Votre image n\'est pas un fichier',
            'profile.image' => 'Votre fichier n\'est pas une image'
        ]);

        $vendeur = Vendeur::findOrFail(session()->get('id'));

        if (request()->has('profile')) {
            $vendeur->update([
                'profile' => request()->profile->storeAs('db/profiles/', time() . "_" . $request->file('profile')->getClientOriginalName(), 'public')
            ]);
        }

        $vendeur->update([
            'username' => $request->input('username'),
        ]);

        session()->put('nom', $vendeur->username);
        session()->put('profile', $vendeur->profile);

        return redirect()->back()->with('success', 'Votre profil a été mis à jour avec succès');

    }

    public function index() {
        $countDocument = Document::where('vendeur_id', session()->get('id'))->count();
        $documentsDownloaded = Document::where('vendeur_id', session()->get('id'))->value('downloaded');
        return view('sellers.index', compact('countDocument', 'documentsDownloaded'));
    }

    public function forgotPasswordForm() {
        return view('sellers.forgotpassword');
    }

    public function forgotPassword(Request $request) {

        $request->validate([
            'email' => 'required'
        ],
        [
            'email.required' => 'Veuillez renseigner votre email'
        ]);

        $find_email = Vendeur::where('email', $request->input('email'))->first();

        if ($find_email == null) {

            return back()->with('error', 'Cet email est invalide. Adresse électronique inexistante');

        } else {

            $forgetPasswordCode = random_int(100000, 999998);

            $find_email->update([
                'forget_password_code' => $forgetPasswordCode
            ]);

            $data = [
                'forget_password_code' => $forgetPasswordCode,
                'email' => $find_email->email,
                'username' => $find_email->username,
                'reset_password_link' => 'sellers/resetPassword'
            ];

            Mail::to($find_email->email)->send(new ForgetPasswordCodeMail($data));

            
            return redirect()->route('sellers.resetPasswordForm')->with('success', 'Un mail a été envoyé à votre adresse électronique. Veuillez poursuivre la réinitialistion en ouvrant votre email et en suivant les instructions');
        }
    }

    public function resetPasswordForm() {
        return view('sellers.resetpassword');
    }

    public function resetPassword(Request $request) {

        $request->validate([
            'forget_password_code' => 'required',
            'new_password' => 'required|confirmed',
            'confirmation_password' => 'required'
        ],
        [
            'forget_password_code.required' => 'Veuillez saisir le code de vérification',
            'new_password.required' => 'Veuillez renseigner votre nouveau mot de passe',
            'new_password.confirmed' => 'Mot de passe non identique',
            'password_confirmation' => 'Veuillez confirmer votre mot de passe'
        ]);

        $findSeller = Vendeur::where('forget_password_code', $request->input('forget_password_code'))->first();

        if ($findSeller == null) {
            return back()->with('error', 'Le code de vérification est invalide');
        } else {

            $findSeller->update([
                'password' => Hash::make($request->input('new_password')),
                'forget_password_code' => '******'
            ]);

            session()->put('id', $findSeller->id);
            session()->put('nom', $findSeller->username);
            session()->put('profile', $findSeller->profile);
            session()->put('email', $findSeller->email);
            session()->put('wallet', $findSeller->wallet);

            $data = [
                'username' => $findSeller->username
            ];

            Mail::to($findSeller->email)->send(new PasswordResetValidationMail($data));

            return redirect(route('sellers.home'));
        }

    }

    public function logout() {
        session()->flush();

        return redirect()->route('sellers.loginForm');
    }
}
