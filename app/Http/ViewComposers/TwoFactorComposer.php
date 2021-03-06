<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Lang;
use Facades\App\Services\WhichPortal;

class TwoFactorComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $confirm_url = '';
        $profile_url = '';
        if (WhichPortal::isApplicantPortal()) {
            $confirm_url = route('two_factor.confirm');
            $profile_url = route('settings.edit');
        } elseif (WhichPortal::isManagerPortal()) {
            $confirm_url = route('manager.two_factor.confirm');
            $profile_url = route('manager.settings.edit');
        } elseif (WhichPortal::isHrPortal()) {
            $confirm_url = route('hr_advisor.two_factor.confirm');
            $profile_url = route('hr_advisor.settings.edit');
        } elseif (WhichPortal::isAdminPortal()) {
            $confirm_url = route('admin.two_factor.confirm');
            $profile_url = backpack_url('2fa');
        }
        $view->with('two_factor', Lang::get('two_factor'))
            ->with('otp', Lang::get('one_time_password'))
            ->with('confirm_url', $confirm_url)
            ->with('profile_url', $profile_url);
    }
}
