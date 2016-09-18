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
    'relationship' => [
        1 => 'Father',
        2 => 'Mother',
        3 => 'Guardian',
        4 => 'Brother',
        5 => 'Sister',
        6 => 'Cousin',
        7 => 'Grandmother',
        8 => 'Grandfather',
        9 => 'Friend',
        10 => 'Husband',
        11 => 'Wife',
        12 => 'Other',
        13 => 'Self',
        14 => 'Uncle',
        15 => 'Aunt',
        16 => 'Son',
        17 => 'Daughter',
    ],
    'document_types' => [
        1 => 'Job',
        2 => 'Lab Report',
        3 => 'Medical Report',
        3 => 'Lab Tests',
        4 => 'Patient History',
        5 => 'Radiology Tests',
        6 => 'X-RAY Records',
        7 => 'Other Reports',
    ],
    'applies_to' => [
        1 => 'Doctor',
        2 => 'Pharmacy',
        3 => 'Lab',
        4 => 'Radiology',
        5 => 'Nursing',
        6 => 'UltraSound',
        7 => 'Diagnostics',
        8 => 'Theatre',
    ],
    'schedule_categories' => [
        1 => 'Consultation',
        2 => 'Lab',
        3 => 'Surgery',
        4 => 'Theatre',
        5 => 'Diagnostics',
    ],
    'checkin_purposes' => [
        1 => 'First time consultation',
        2 => 'Review after surgery',
        3 => 'Follow up review',
        4 => 'General Consultation',
    ],
    'visit_status' => [
        1 => 'Scheduled',
        2 => 'Checked In',
        3 => 'Checked Out',
        3 => 'Cancelled',
        4 => 'Rescheduled',
        5 => 'Proposed',
        6 => 'No show',
    ],
    'temperature_location' => [
        1 => 'Oral',
        2 => 'Rectal',
        3 => 'Tympanic Membrane',
        4 => 'Axilary',
        5 => 'Temporal Atery',
    ],
    'prescription_method' => [
        1 => ' b.i.d',
        2 => 't.i.d',
        3 => 'q.i.d',
        4 => 'STAT',
        5 => 'O.D',
        6 => 'q.3h',
        7 => 'q.4h',
        8 => 'q.5h',
        9 => 'q.6h',
        10 => 'q.8h',
        11 => 'q.d',
        12 => 'a.c',
        13 => 'p.c.',
        14 => 'a.m',
        15 => 'p.m',
        16 => 'anti',
        17 => 'h',
        18 => 'hs',
        19 => 'p.r.n',
        20 => 'Hourly',
        21 => 'Two Hourly',
        22 => 'Four Hourly',
        23 => 'Nocte',
        24 => 'alternate day',
        25 => 'morning',
    ],
    'prescription_whereto' => [
        /* 1 => 'Per Oris',
          2 => 'Per Rectum',
          3 => 'To Skin',
          4 => 'To Affected area',
          5 => 'Sublingual', */
        6 => 'OS',
        7 => 'OD', /*
          8 => 'OU',
          9 => 'SQ',
          10 => 'IM',
          11 => 'IV',
          12 => 'Per Nostril',
          13 => 'Both Ears',
          14 => 'Left Ear',
          15 => 'Right Ear',
          16 => 'Per Eye',
          17 => 'Sub-conj',
          18 => 'Intra-vitreal', */
        19 => 'Both Eyes',
        20 => 'To Affected Area',
        21 => 'Oral',
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
