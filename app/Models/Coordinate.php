<?php

namespace App\Models;


class Coordinate extends Model
{
    protected $connection = 'BoolBnB_DB';
    protected $collection = 'coordinate';

    protected $fillable = ['indirizzo', 'latitudine', 'longitudine'];
}
