<?php


return [
    'email' => [
        'required' => 'The email is required.',
        'email' => 'The email must be a valid email address.',
        'unique' => 'The email is already in use.',
    ],
    'password' => [
        'required' => 'The password is required.',
        'min' => 'The password must be at least 8 characters.',
    ],
    'section_id' => [
        'required' => 'The section is required.',
        'exists' => 'The selected section does not exist.',
    ],
    'phone' => [
        'required' => 'The phone number is required.',
        'regex' => 'The phone number must be valid and belong to the allowed countries (Egypt, Saudi Arabia, UAE).',
    ],
    'price' => [
        'required' => 'The price is required.',
        'numeric' => 'The price must be a number.',
    ],
    'name' => [
        'required' => 'The doctor\'s name is required.',
    ],
    'appointments' => [
        'required' => 'Please specify the doctor\'s appointments.',
    ],
];