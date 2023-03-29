<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\ClientAddedEvent;

class Client extends Model
{
    use HasFactory;

    // protected $dispatchesEvents = [
    //     'created' => ClientAddedEvent::class,
    // ];

    protected $fillable = ['fName', 'lName', 'address', 'email', 'id_user'];
}
