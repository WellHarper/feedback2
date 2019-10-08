<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Curso;
use App\Quesito;
use DB;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    public function quesitos()
    {
        //return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
        return $this->belongsToMany('App\Quesito', 'feedback_quesito', 'feedback_id', 'quesito_id')->withPivot('nota');
    }

    public function curso()
    {
        return $this->hasOne('App\Curso', 'id', 'curso_id');
        //return $this->hasOne('Curso','curso_id');
    }

    public function GetFullFeedback($id){
        return DB::table('feedback_quesito')
            ->join('feedbacks', 'feedbacks.id', '=', 'feedback_quesito.feedback_id')
            ->join('quesitos', 'quesitos.id', '=', 'feedback_quesito.quesito_id')
            ->select('feedbacks.*', 'quesitos.*', 'feedback_quesito.nota', 'quesitos.nome AS quesito_nome')
            ->where('feedbacks.id', '=', $id)
            ->get();
    }

    public function chart(){
        /*
        return DB::table('feedback_quesito')
            //->join('feedbacks', 'feedbacks.id', '=', 'feedback_quesito.feedback_id')
            ->join('quesitos', 'quesitos.id', '=', 'feedback_quesito.quesito_id')
            //->select('feedbacks.*', 'quesitos.*', 'feedback_quesito.nota', 'quesitos.nome AS quesito_nome')
            ->select('quesitos.*', 'feedback_quesito.nota', 'quesitos.nome AS quesito_nome', COUNT())
            //->where('feedbacks.id', '=', $id)
            ->get();
        */

        return DB::table('feedback_quesito')
            ->join('quesitos', 'quesitos.id', '=', 'feedback_quesito.quesito_id')
                ->select('quesitos.nome', DB::raw('(SUM(nota)/COUNT(nota)) as media'))
                ->groupBy('quesitos.nome')
                //->havingRaw('SUM(price) > ?', [2500])
                ->get();
    }

}