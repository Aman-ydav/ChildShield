<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    use HasFactory;

    protected $table = 'contact_submissions';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'message',
        'ip_address',
    ];
}
