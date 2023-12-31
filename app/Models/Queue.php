<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = [
        'queue_number',
        'has_check',
        'has_drug',
        'patient_id',
        'doctor_id',
        'main_complaint',
        'service_id',
        'jenis_rawat',
        'medical_record_id',
        'pregnantmom_id'
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function doctor(){
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function medicalrecord(){
        return $this->belongsTo(MedicalRecord::class, 'medical_record_id');
    }

    public function transaction(){
        return $this->hasOne(Transaction::class, 'queue_id', 'id');
    }

    public function inap()
    {
        return $this->belongsTo("App\Models\MedicalRecordInap", "medical_record_id", "medical_record_id");
    }

    public function pregnantmom()
    {
        return $this->belongsTo("App\Models\Pregnantmom", "pregnantmom_id", "id");
    }

    protected $with = [
        'patient',
        'doctor',
        'service',
        'medicalrecord'
    ];

    protected $casts = [
        'has_check' => 'boolean',
        'has_drug' => 'boolean'
    ];
}
