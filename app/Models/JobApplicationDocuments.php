<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicationDocuments extends Model
{
    use HasFactory;
    protected $table='job_application_doc';

    public function jobApplication()
{
    return $this->belongsTo(JobApplication::class);
}


}
