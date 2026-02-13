<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
  protected $fillable = [
    'type','name','email','phone','subject','message',
    'origin','destination','shipment_type','weight','dimensions','incoterm',
    'page_url','ip_address','user_agent',
    'is_read','read_at'
  ];

  protected $casts = [
    'is_read' => 'boolean',
    'read_at' => 'datetime',
  ];
}
