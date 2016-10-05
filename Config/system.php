<?php

/*
 * =============================================================================
 *
 * Collabmed Solutions Ltd
 * Project: Collabmed Health Platform
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 *
 * =============================================================================
 */

return [
    'type' => env('APP_TYPE', 'remote'),
    'host' => 'collabmed.net', //can be either local or remote
    'company' => 'Collabmed',
    'allow_registration' => false,
    'name' => 'iClinic',
    'website' => 'http://www.collabmed.com/',
    'email' => 'info@collabmed.com',
    'webmaster' => 'Samuel Odhiambo',
    'webmaster_email' => 'sodhiambo@collabmed.com',
    'styled_name' => "<b>i</b>Clinic",
    'version' => '1.0.2',
    'clinic_types' => [
        'dental' => 'Dental',
        'medical' => 'Medical',
        'pharmacy' => 'Pharmacy',
        'store' => 'Inventory Store'
    ],
    'ward_types' => ['general' => 'General', 'private' => 'Private'],
    'bed_types' => [0 => 'Elevation', 1 => 'Wheels', 2 => 'Side Rails'],
    'scheme_types' => [1 => 'Full', 2 => 'Capitation', 3 => 'Copay',],
    'checkin_purposes' => [
        1 => 'First time consultation',
        2 => 'Review after surgery',
        3 => 'Follow up review',
        4 => 'General Consultation',
    ],
    'receipt_prefix' => 'DRM',
    'payment_modes' => [
        'cash' => 'Cash',
        'mpesa' => 'MPESA',
        'cheque' => 'Cheque',
        'insurance' => 'Insurance',
        'card' => 'Card',
    ],
    'calendar' => [
        'email' => 'eagle-eye@online-hospital-calendar.iam.gserviceaccount.com'
    ],
    'colors' => [
        1 => '#95A4C7',
        2 => '#BEE635',
        3 => '#35E6E1',
        4 => '#D252F8',
        5 => '#F2BEF8',
    ],
    'destinations' => [
        'laboratory' => 'Laboratory',
        'theatre' => 'Theatre',
        'diagnostics' => 'Diagnostics',
        'radiology' => 'Radiology',
        //'pharmacy' => 'Pharmacy',
        //  'optical' => 'Optical',
        '' => '----------',
    ]
];
