<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Feedback;

class Quesito extends Model
{
    protected $table = 'quesitos';

    protected $fillable = ['nome', 'descricao'];
    
    public function feedbacks()
    {
        return $this->belongsToMany('Feedback', 'feedback_quesito', 'quesito_id', 'feedback_id');
    }

}