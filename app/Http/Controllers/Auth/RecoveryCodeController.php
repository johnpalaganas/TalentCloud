<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Facades\App\Services\WhichPortal;
use PragmaRX\Google2FALaravel\Support\Authenticator;
use Illuminate\Support\Facades\Validator;

class RecoveryCodeController extends AuthController
{
    use GenerateRecoveryCodes;

    public function show(Request $request)
    {
        $user = $request->user();
        $this->generateCodesForUser($user);

        return view('auth.recovery_codes', [
            'recovery_codes' => Lang::get('common/auth/recovery_codes'),
            'codes' => $user->recovery_codes,
        ]);
    }

    public function generate(Request $request)
    {
        $user = $request->user();
        $this->generateCodesForUser($user);
        return redirect(route('recovery_codes.show'));
    }

    public function use(Request $request)
    {
        return view('auth.use_recovery_code', [
            'recover' => Lang::get('common/auth/use_recovery_code'),
            'return_url' => route('home'),
            'otp_url' => redirect()->intended(WhichPortal::home())->getTargetUrl(),
        ]);
    }

    public function authenticate(Request $request)
    {
        Validator::make($request->all(), [
            'recovery_code' => 'required|string',
        ])->validate();
        $recovery_code = $request->input('recovery_code');
        $user = $request->user();
        $valid_codes = collect($user->recovery_codes);
        if ($valid_codes->contains($recovery_code)) {
            $authenticator = app(Authenticator::class)->boot($request);
            $authenticator->login();
            $still_valid_codes = $valid_codes->filter(function ($value) use ($recovery_code) {
                return $value != $recovery_code;
            });
            $user->recovery_codes = $still_valid_codes->toArray();
            $user->save();
            return redirect()->intended(WhichPortal::home());
        }
        return redirect(route('recovery_codes.use'))
            ->withErrors(['incorrect' => Lang::get('common/auth/use_recovery_code.incorrect_code')]);
    }
}
