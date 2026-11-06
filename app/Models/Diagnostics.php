<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Diagnostics extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'firstName',
        'lastName',
        'name',
        'age',
        'gender',
        'contact',
        'houseBuildingNo',
        'streetName',
        'barangaySubdivision',
        'cityMunicipality',
        'region',
        'zipCode',
        'address',
        'email',
        'reqphysician',
        'package1',
        'package2',
        'package3',
        'package4',
        'individualTest1',
        'individualTest2',
        'individualTest3',
        'individualTest4',
        'individualTest5',
        'individualTest6',
        'individualTest7',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
    ];
}
