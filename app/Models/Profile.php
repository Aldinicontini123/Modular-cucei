<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    // Campos asignables en masa
    protected $fillable = [
        'user_id',
        'degree_id',
        'end_studies_date',
        'actual_job',
        'actual_company',
        'time_current_company',
        'first_job',
        'description_first_job',
        'hardskills',
        'technologies',
        'certifications',
        'softskills',
        'proyects_practicies',
        'extras_cources',
        'council',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Degree
    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }
}
