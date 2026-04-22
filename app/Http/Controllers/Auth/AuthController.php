<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Settings;
use Illuminate\Support\Facades\Http;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $settings = Settings::first();
        $url = "https://recaptchaenterprise.googleapis.com/v1/projects/{$settings->recaptcha_project_id}/assessments?key={$settings->recaptcha_api_key}";

        $response = Http::acceptJson()->post($url, [
            'event' => [
                'token' => $request->recaptcha,
                'siteKey' => $settings->recaptcha_key,
                'expectedAction' => 'login_form',
                'userAgent' => request()->userAgent(),
                'userIpAddress' => request()->ip(),
            ],
        ]);

        $result = $response->json();

        $valid = data_get($result, 'tokenProperties.valid', false);
        $score = (float) data_get($result, 'riskAnalysis.score', 0);
        $action = data_get($result, 'tokenProperties.action');

        if (! $valid || $action !== 'login_form' || $score < 0.5) {
            throw ValidationException::withMessages([
                'recaptcha' => 'reCAPTCHA doğrulaması başarısız oldu. Lütfen tekrar deneyin.',
            ]);
        }


        $credentials = [
            'email' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Sentinel::authenticate($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->withErrors(['message' => 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.']);
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect()->route('login');
    }
}
