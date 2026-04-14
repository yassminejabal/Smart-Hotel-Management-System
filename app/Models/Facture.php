<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
    'date_facture',
    'total',
    'reservation_id',
];

public function reservation()
{
    return $this->belongsTo(Reservation::class);
}
}
