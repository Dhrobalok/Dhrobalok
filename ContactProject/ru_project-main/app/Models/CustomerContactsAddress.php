<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContactsAddress extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','name','job_position','phone_number','mobile_number','email_address','street','city','state','zip_code','country','internal_notes',
    'contacts_type'];
}
