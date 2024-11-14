<?php

return [
	'payment_store_success' => 'Payment details stored successfully.',
	'file_create' => 'File uploaded successfully.',
	'file_delete' => 'File removed successfully.',
    'contact_form_created' => 'Contact saved and mail sent successfully',
    'user_created' => 'User created successfully',
    'not_found_cameras' => 'No cameras found',
    'qr_code_not_valid' => 'No user information found from the QR code. Please make sure the QR code is valid and contains the correct data(like name, email, phone number, address or website).',
    'qr_code_success' => 'QR code scanned and saved successfully.',
	'contact_us_form' => [
        'contact_person_name' => [
            'required' => 'The contact person name field is required.',
            'string' => 'The contact person name must be a string.',
            'max' => 'The contact person name field cannot exceed 255 characters.',
            'noSpace' => 'Spaces are not allowed',
        ],
        'company_name' => [
            'required' => 'The company name field is required.',
            'string' => 'The company name must be a string.',
            'max' => 'The company name field cannot exceed 255 characters.',
        ],
        'city' => [
            'required' => 'The city field is required.',
            'string' => 'The city must be a string.',
            'max' => 'The city field cannot exceed 255 characters.',
            'noSpace' => 'Spaces are not allowed',
        ],
        'country' => [
            'required' => 'The country field is required.',
            'string' => 'The country must be a string.',
            'max' => 'The country field cannot exceed 255 characters.',
        ],
        'email' => [
            'required' => 'The email field is required.',
            'email' => 'Please enter a valid email address.',
            'max' => 'The email field cannot exceed 255 characters.',
        ],
        'website' => [
            'required' => 'The website field is required.',
            'url' => "Please enter a valid URL with or without 'https://'",
            'max' => 'The website field cannot exceed 255 characters.',
        ],
        'phone_number' => [
            'required' => 'The mobile number field is required.',
            'regex' => 'Please enter a valid mobile number.',
            'min' => 'The mobile number must be at least 10 characters.',
            'max' => 'The mobile number must not exceed 20 characters.',
        ],
        'industry' => [
            'required' => 'The industry field is required.',
            'string' => 'The industry must be a string.',
            'min' => 'The industry must be at least 10 characters.',
            'max' => 'The industry must not exceed 20 characters.',
        ],
        'name' => [
            'noSpace' => 'Spaces are not allowed',
        ]
    ],
    'about_us_form' => [
        'contact_person_name' => [
            'required' => 'The contact person name field is required.',
            'string' => 'The contact person name must be a string.',
            'max' => 'The contact person name field cannot exceed 255 characters.',
        ],
        'country' => [
            'required' => 'The country field is required.',
            'string' => 'The country must be a string.',
            'max' => 'The country field cannot exceed 255 characters.',
        ],
        'industry' => [
            'required' => 'The industry field is required.',
            'string' => 'The industry must be a string.',
            'min' => 'The industry must be at least 10 characters.',
            'max' => 'The industry must not exceed 20 characters.',
        ],
    ],
    'broucher_success' => 'Broucher Download Successfully',
    'status_update_success' => 'Status Update Successfully',
    'visitor_ticket_management' => 'Visitor Ticket Management',
    'event_manage' => 'Event Manage',
    'gallery_management' => 'Gallery Management',
    'media_partner_mng' => 'Media Partners Management',
    'member_ass_mng' => 'Member & Association Management',
    'sponsor_mng' => 'Sponsors Management',
    'sector_mng' => 'Sector Management',
    'sub_sector_mng' => 'Sub Sector Management',
    'home_page_mng' => 'Homepage Slides Management',
    'social_mng' => 'Social Management',
    'speaker_mng' => 'Speaker Management',
    'vip_guest_mng' => 'VIP Guest Management',
    'chief_guest_mng' => 'Chief Guest Management',
    'chatbot_q&a' => 'Chatbot Q & A',
    'others' => [
        'decimal_number' => 'The :attribute must be a valid number with an optional decimal part.'
    ],
    'ticket_create_success' => 'Ticket created successfully',
    'event_not_found' => 'Event not found',
    'ticket_update_success' => 'Ticket updated successfully',
    'payment_installments' => 'Payment Installments',
    'no_sub_sector_found' => 'No Sub Sectors found.',
    'company_physical_address' => [
        'required' => 'Company Physical Address field is required.'
    ],
    'gstin_number' => 'GST number field is required.',
    'FAQ' => 'FAQ',
];