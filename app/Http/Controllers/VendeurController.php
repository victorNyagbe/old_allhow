<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendeur;
use App\Document;
use Illuminate\Support\Facades\Hash;

class VendeurController extends Controller
{

    public function __construct() {
        $this->middleware('check.session')->except(['loginForm', 'login', 'registrationForm', 'register']);
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

    public function logout() {
        session()->flush();

        return redirect()->route('sellers.loginForm');
    }
}
