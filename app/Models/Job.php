<?php

namespace App\Models;
use App\Models\Tag;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model {    
    use HasFactory;
    protected $table = 'job_listings'; 

    // protected $fillable = ['title', 'salary','employer_id'];
    protected $guarded = []; // This will allow mass assignment for all fields except those explicitly guarded

    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
