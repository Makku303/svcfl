<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Results extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'patientNo',
        'requestNo',
        'hematocrit',
        'hgb',
        'neutro',
        'lympho',
        'mono',
        'eosino',
        'baso',
        'cbcWbc',
        'cbcRbc', 
        'platelet', 
        'bloodType',
        'cbcRemarks', 
        'uaColor', 
        'transparency', 
        'ph',
        'sgravity',
        'protein',
        'glucose',
        'ec',
        'mt',
        'bacteria',
        'cast',
        'crystal',
        'amorphous',
        'microOrganism',
        'others',
        'uaRbc',
        'uaWbc',
        'seColor',
        'seConsistency',
        'seWbc',
        'seRbc',
        'amoeba',
        'eColi',
        'eHistolica',
        'hookworm',
        'whipworm',
        'pinworm',
        'yeastCells',
        'ascaris',
        'giardiaLamblia',
        'seOthers',
        'occultBlood',
        'seRemark',
        'hepaB',
        'hepaA',
        'hiv',
        'hssAgQualitative',
        'hBsAgQuantitative',
        'hBsAgValueQuantitative',
        'syphilis',
        'pTSerum',
        'pTUrine',
        'rATest',
        'fbs',
        'rbs',
        'HPPS2',
        'hBA1C',
        'oGTT50g',
        'oGTT75gFullFasting',
        'oGTT75gAfter1hour',
        'oGTT75gAfter2hours',
        'alp',
        'cholines',
        'sGPT',
        'sGOT',
        'sodium',
        'potasium',
        'ica',
        'chloride',
        'cholesterol',
        'triglyceride',
        'hdl',
        'ldl',
        'vldl',
        'bua',
        'bun',
        'creatine',
        'tProtein',
        'albumin',
        'globulin',
        'chemNote',
        'timeReceived1',
        'timeReleased1',
        'unit1',
        'timeReleased2',
        'timeReceived2',
        'unit2',
        'noteSputum',
        'tSH',
        'fT4',
        'fT3',
        't3',
        't4',
        'noteThyroid',
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
