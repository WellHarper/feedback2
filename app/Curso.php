<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = ['nome', 'descricao'];
    
    //public function feedbacks()
    //{
    //    return $this->belongsToMany('App\Feedback', 'feedback_quesito', 'quesito_id', 'feedback_id');
    //}
}