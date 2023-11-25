<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Service extends Eloquent
{
    use HasFactory;
    protected $table = "services";
    protected $fillable = [
        'type',
        'vendor',
        'attentionTo',
        'quotationNo',
        'invoice',
        'customer',
        'vendorAddress',
        'noPoCustomer',
        'cost',
        'status'
    ];
}
