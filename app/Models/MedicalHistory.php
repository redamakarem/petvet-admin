<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalHistory extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'medical_histories';

    public $orderable = [
        'id',
        'title',
        'record_date',
        'record_pet.name',
        'record_user.name',
    ];

    public $filterable = [
        'id',
        'title',
        'record_date',
        'record_pet.name',
        'record_user.name',
    ];

    protected $dates = [
        'record_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'record_date',
        'record_pet_id',
        'record_user_id',
    ];

    public function getRecordDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setRecordDateAttribute($value)
    {
        $this->attributes['record_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function recordPet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function recordUser()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
