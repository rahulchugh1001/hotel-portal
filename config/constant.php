<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'model' => ['Permission','Ajax','AssignAgency','AssignCandidate','AssignCompany','Cms','Cron','Event','Payment','Pdf','Post','Role','Setting','SubRole','UserPlan','UserDetail','UserProfile'],
	
	'gender' => [
								
								'1'=> 'Male',
								'2'=> 'Female'
								
		],
		
	'employment_type' => [
								
								'1'=> 'Temporary',
								'2'=> 'Permanent',
								'3'=> 'Part Time',
								
								
		],
		
	'salary_period' => [
								
								'1'=> 'Weekly',
								'2'=> 'Monthly'
					
		],
		
		
	'status' => [
								
								'0'=> 'InActive',
								'1'=> 'Active'
					
		],
    'organization_type' => [
                            
                            '1'=> 'Sole Proprietorship',
                            '2'=> 'Partnership',
                            '3'=> 'Part Corporation',
                            '4'=> 'Limited Liability Company (LLC)',
                            
                            
    ],
    'employees' => [
                            
                            '1'=> '1-10 employees',
                            '2'=> '11-50 employees',
                            '3'=> '51-200 employees',
                            
                            
    ],
    'create_for' => [
                            
                            '1'=> 'Company',
                            '2'=> 'Agency',
                            '3'=> 'Candidate',
                            
                            
    ],
    'plan_cycle' => [
                            
                            '1'=> '1 Month',
                            '2'=> '3 Months',
                            '3'=> '6 Months',
                            '4'=> '1 Year',
                            
                            
    ],

    'lableName'=>[
    	'country_id'=>'Country',
    	'state_id'=>'State',
    	'city_id'=>'City',
    	'user_Id'=>'User',
    	'no_employees'=>'No Employees',
    	'plan_id'=>'Plan Id',
    	'google_plus'=>'Google Plus',
    	'organization_type'=>'Organization Type',
    	'Linked In'=>'Linked In',
    	'logo_path'=>'Logo',
    	'created_by'=>'Created By',
    	'relation_type'=>'Relation Type'


    ],
    'dd_chq' => [
                            
                            '1'=> 'DD',
                            '2'=> 'DD+CHQ',
                            '3'=> 'CHQ',
                            '4'=> 'OS',
                            '5'=> 'OS+CHQ',
                            '6'=> 'Cash',
                            
                            
    ],
    'registration_mode' => [
                            
                            '1'=> 'Online',
                            '2'=> 'Visited',                            
                            
    ],
    'residence_type' => [
                            
                            '1'=> 'PR',
                            '2'=> 'Citizen',                            
                            '3'=> 'Student',                            
                            '4'=> 'Work Permit',                            
                            '5'=> 'Work Permit (Refugee)',                            
                            '6'=> 'Applying for Work Permit',                            
                            '7'=> 'Applied for Work Permit',                            
                            '8'=> 'visitor',                            
                            
    ],
    'transportation_mode' => [
                            
                            '1'=> 'Car',
                            '2'=> 'Bus',                            
                            '2'=> 'Bike',                            
                            
    ]


];
?>