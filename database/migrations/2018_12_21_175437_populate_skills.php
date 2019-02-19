<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopulateSkills extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        DB::table('skills')->insert([
            ['skill_type_id' => 2, 'name' => 'front_end_dev'],
            ['skill_type_id' => 2, 'name' => 'web_programming'],
            ['skill_type_id' => 2, 'name' => 'server_admin'],
            ['skill_type_id' => 2, 'name' => 'linux'],
            ['skill_type_id' => 2, 'name' => 'css'],
            ['skill_type_id' => 2, 'name' => 'javascript'],
            ['skill_type_id' => 2, 'name' => 'c_plus_plus'],
            ['skill_type_id' => 2, 'name' => 'sass'],
            ['skill_type_id' => 2, 'name' => 'python'],
            ['skill_type_id' => 2, 'name' => 'php'],
            ['skill_type_id' => 2, 'name' => 'git'],
            ['skill_type_id' => 2, 'name' => 'docker'],
            ['skill_type_id' => 2, 'name' => 'html'],
            ['skill_type_id' => 2, 'name' => 'sql'],
            ['skill_type_id' => 2, 'name' => 'open_source'],
            ['skill_type_id' => 2, 'name' => 'verbal_communication'],
            ['skill_type_id' => 2, 'name' => 'written_communication'],
            ['skill_type_id' => 2, 'name' => 'ability_distributed_team'],
            ['skill_type_id' => 1, 'name' => 'ability_learn'],
            ['skill_type_id' => 1, 'name' => 'integrity'],
            ['skill_type_id' => 1, 'name' => 'ability_collaborate'],
            ['skill_type_id' => 1, 'name' => 'initiative'],
            ['skill_type_id' => 1, 'name' => 'humility'],
            ['skill_type_id' => 1, 'name' => 'passion'],
            ['skill_type_id' => 1, 'name' => 'flexibility'],
            ['skill_type_id' => 1, 'name' => 'judgement'],
            ['skill_type_id' => 1, 'name' => 'adaptability'],
            ['skill_type_id' => 1, 'name' => 'accountability'],
            ['skill_type_id' => 1, 'name' => 'attention_detail'],
            ['skill_type_id' => 1, 'name' => 'complex_problem_solving'],
            ['skill_type_id' => 1, 'name' => 'courage'],
            ['skill_type_id' => 1, 'name' => 'originality'],
            ['skill_type_id' => 1, 'name' => 'critical_thinking'],
            ['skill_type_id' => 1, 'name' => 'curiosity'],
            ['skill_type_id' => 1, 'name' => 'dependability'],
            ['skill_type_id' => 1, 'name' => 'ability_follow_instructions'],
            ['skill_type_id' => 1, 'name' => 'persistence'],
            ['skill_type_id' => 1, 'name' => 'resilience'],
            ['skill_type_id' => 1, 'name' => 'service_orientation'],
            ['skill_type_id' => 1, 'name' => 'social_perceptiveness'],
            ['skill_type_id' => 1, 'name' => 'stress_management'],
            ['skill_type_id' => 1, 'name' => 'stress_tolerance'],
            ['skill_type_id' => 1, 'name' => 'time_management'],
            ['skill_type_id' => 1, 'name' => 'willingness_learn'],
            ['skill_type_id' => 2, 'name' => 'management_ability'],
            ['skill_type_id' => 2, 'name' => 'experience_design'],
            ['skill_type_id' => 2, 'name' => 'project_management'],
            ['skill_type_id' => 2, 'name' => 'stakeholder_relations'],
            ['skill_type_id' => 2, 'name' => 'dot_net'],
            ['skill_type_id' => 2, 'name' => 'geospacial_programming'],
            ['skill_type_id' => 2, 'name' => 'microsoft_dynamics'],
            ['skill_type_id' => 2, 'name' => 'facilitation'],
            ['skill_type_id' => 2, 'name' => 'systems_thinking'],
            ['skill_type_id' => 2, 'name' => 'web_architecture'],
            ['skill_type_id' => 2, 'name' => 'storytelling'],
            ['skill_type_id' => 2, 'name' => 'user_design'],
            ['skill_type_id' => 1, 'name' => 'empathy'],
            ['skill_type_id' => 2, 'name' => 'analysis'],
            ['skill_type_id' => 2, 'name' => 'data_science'],
            ['skill_type_id' => 1, 'name' => 'results_oriented'],
            ['skill_type_id' => 1, 'name' => 'relationship_management'],
            ['skill_type_id' => 2, 'name' => 'data_analysis'],
            ['skill_type_id' => 2, 'name' => 'data_mining'],
            ['skill_type_id' => 2, 'name' => 'r_programming'],
            ['skill_type_id' => 2, 'name' => 'database_design_and_management'],
            ['skill_type_id' => 2, 'name' => 'scrum'],
            ['skill_type_id' => 2, 'name' => 'team_foundation_server'],
            ['skill_type_id' => 2, 'name' => 'n_unit_testing'],
            ['skill_type_id' => 2, 'name' => 'asp_net_mvc'],
            ['skill_type_id' => 2, 'name' => 'ef6'],
            ['skill_type_id' => 2, 'name' => 'cloud_architecture_for_mobile_and_applications'],
            ['skill_type_id' => 2, 'name' => 'cloud_computing_platform_configuration'],
            ['skill_type_id' => 2, 'name' => 'strategy_development'],
        ]);
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        DB::table('skills')->whereIn('name',
        [
            'front_end_dev',
            'web_programming',
            'server_admin',
            'linux',
            'css',
            'javascript',
            'c_plus_plus',
            'sass',
            'python',
            'php',
            'git',
            'docker',
            'html',
            'sql',
            'open_source',
            'verbal_communication',
            'written_communication',
            'ability_distributed_team',
            'ability_learn',
            'integrity',
            'ability_collaborate',
            'initiative',
            'humility',
            'passion',
            'flexibility',
            'judgement',
            'adaptability',
            'accountability',
            'attention_detail',
            'complex_problem_solving',
            'courage',
            'originality',
            'critical_thinking',
            'curiosity',
            'dependability',
            'ability_follow_instructions',
            'persistence',
            'resilience',
            'service_orientation',
            'social_perceptiveness',
            'stress_management',
            'stress_tolerance',
            'time_management',
            'willingness_learn',
            'management_ability',
            'experience_design',
            'project_management',
            'stakeholder_relations',
            'dot_net',
            'geospacial_programming',
            'microsoft_dynamics',
            'facilitation',
            'systems_thinking',
            'web_architecture',
            'storytelling',
            'user_design',
            'empathy',
            'analysis',
            'data_science',
            'results_oriented',
            'relationship_management',
            'data_analysis',
            'data_mining',
            'r_programming',
            'database_design_and_management',
            'scrum',
            'team_foundation_server',
            'n_unit_testing',
            'asp_net_mvc',
            'ef6',
            'cloud_architecture_for_mobile_and_applications',
            'cloud_computing_platform_configuration',
            'strategy_development',
        ])->delete();
    }
}