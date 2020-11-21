<?php

namespace SocialHP\Model;

class Contact extends \ActiveRecord\Model
{
    static $table = 'contact';
    
    static $primary_key = 'id';
    
    static $belongs_to = [
        ['domain', 'foreign_key' => 'contact_domain_id', 'class_name' => 'ContactDomain']
    ];
}
