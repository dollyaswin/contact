<?php

namespace SocialHP\Model;

class ContactDomain extends \ActiveRecord\Model
{
    static $table = 'contact_domain';
    
    static $primary_key = 'id';
    
    static $has_many = [
        ['contact', 'foreign_key' => 'id', 'class_name' => 'Contact']
    ];
}
