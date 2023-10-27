<?php
defined('BASEPATH') OR exit('No direct script access allowed');

switch($_SERVER["HTTP_HOST"]){
    case "localhost":
        $config['package_api'] = 'http://localhost/schoolsoftware/api/packages';
        $config['currency_api'] = 'http://localhost/schoolsoftware/api/currency';
        $config['payments_api'] = 'http://localhost/schoolsoftware/api/payments';
        $config['settings_api'] = 'http://localhost/schoolsoftware/api/settings';
        $config['package_settings_api'] = 'http://localhost/schoolsoftware/api/package_settings';
        $config['school_id_api'] = 'http://localhost/schoolsoftware/api/school_id';
        $config['email_validation_api'] = 'http://localhost/schoolsoftware/api/email_validation?email=';
        $config['customPackage_settings_api'] = 'http://localhost/schoolsoftware/api/customPackage_settings';
        $config['package_id_api'] = 'http://localhost/schoolsoftware/api/package_id?package_id=';
        $config['add_package_api'] = 'http://localhost/schoolsoftware/api/add_package';
        $config['add_school_api'] = 'http://localhost/schoolsoftware/api/add_school';
        $config['add_user_api'] = 'http://localhost/schoolsoftware/api/add_user';
        $config['add_payment_api'] = 'http://localhost/schoolsoftware/api/add_payment';
       // $config['validate_coupon_api'] = 'http://localhost/schoolsoftware/api/validate_coupon?coupon_code=';
        $config['validate_coupon_api'] = 'http://localhost/schoolsoftware/api/';
        
       $config['update_payment_api'] = 'http://localhost/schoolsoftware/api/update_payment';
        $config['update_school_api'] = 'http://localhost/schoolsoftware/api/update_school';
        $config['update_package_api'] = 'http://localhost/schoolsoftware/api/update_package';
    break;
    default:
        $config['package_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/packages';
        $config['currency_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/currency';
        $config['payments_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/payments';
        $config['settings_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/settings';
        $config['package_settings_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/package_settings';
        $config['school_id_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/school_id';
        $config['email_validation_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/email_validation?email=';
        $config['customPackage_settings_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/customPackage_settings';
        $config['package_id_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/package_id?package_id=';
        $config['add_package_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/add_package';
        $config['add_school_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/add_school';
        $config['add_user_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/add_user';
        $config['add_payment_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/add_payment';
       // $config['validate_coupon_api'] = 'https://www.test.karthikeyaschool.com/schoolsoftware/api/validate_coupon?coupon_code=';
        $config['validate_coupon_api'] = 'http://www.test.karthikeyaschool.com/schoolsoftware/api/';
       
       $config['update_payment_api'] = 'http://www.test.karthikeyaschool.com/schoolsoftware/api/update_payment';
        $config['update_school_api'] = 'http://www.test.karthikeyaschool.com/schoolsoftware/api/update_school';
        $config['update_package_api'] = 'http://www.test.karthikeyaschool.com/schoolsoftware/api/update_package';
break;
}