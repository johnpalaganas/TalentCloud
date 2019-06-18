<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Config;
use App\Services\Validation\Rules\ValidIdRule;
use App\Models\Lookup\Department;
use App\Models\Lookup\Province;
use App\Models\Lookup\SecurityClearance;
use App\Models\Lookup\LanguageRequirement;

class UpdateJobPoster extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return string[]
     */
    public function rules(): array
    {
        $dateFormat = Config::get('app.api_datetime_format');
        $dateFormatRule = "date_format:$dateFormat";
        return [
            'term_qty' => 'nullable|numeric',
            'open_date_time' =>['nullable', $dateFormatRule],
            'close_date_time' => ['nullable', $dateFormatRule],
            'start_date_time' =>['nullable', $dateFormatRule],
            'department_id' => ['nullable', new ValidIdRule(Department::class)],
            'province_id' => ['nullable', new ValidIdRule(Province::class)],
            'security_clearance_id' => ['nullable', new ValidIdRule(SecurityClearance::class)],
            'language_requirement_id' => ['nullable', new ValidIdRule(LanguageRequirement::class)],
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric',
            'noc' => 'nullable|numeric',
            'classification_code' => 'nullable|regex:/[A-Z]{2}/',
            'classification_level' => 'nullable|numeric',
            'remote_work_allowed' => 'nullable|boolean',
            'en.city' => 'nullable|string',
            'en.title' => 'nullable|string',
            'en.team_impact' => 'nullable|string',
            'en.hire_impact' => 'nullable|string',
            'en.division' => 'nullable|string',
            'en.branch' => 'nullable|string',
            'en.education' => 'nullable|string',
            'fr.city' => 'nullable|string',
            'fr.title' => 'nullable|string',
            'fr.team_impact' => 'nullable|string',
            'fr.hire_impact' => 'nullable|string',
            'fr.division' => 'nullable|string',
            'fr.branch' => 'nullable|string',
            'fr.education' => 'nullable|string',
        ];
    }
}