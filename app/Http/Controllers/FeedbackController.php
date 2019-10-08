<?php

namespace App\Http\Controllers;
use App\Feedback;
use App\Curso;
use App\Quesito;
use Illuminate\Http\Request;
use DB;
use Mail;
use App\Text2bin;

class FeedbackController extends Controller
{

    /*
    * @var Item
    */
    private $feedback;
    private $curso;
    private $quesito;
    private $text2bin;

    public function __construct(Feedback $feedback, Curso $curso, Quesito $quesito, TExt2bin $text2bin)
    {
        $this->feedback = $feedback;
        $this->curso    = $curso;
        $this->quesito  = $quesito;
        $this->text2bin = $text2bin;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $feedbacks = $this->feedback::orderBy('id','DESC')->get();
        return view('feedback.feedback_index', compact('feedbacks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //DB::enableQueryLog();
        $feedback = $this->feedback->find($id);
        $quesitos = $this->feedback->GetFullFeedback($id);
        //$queries = DB::getQueryLog();
        //dd($queries);
        return view('feedback.feedback_show',compact('feedback', 'quesitos'));
    }

    public function chart()
    {
        //DB::enableQueryLog();
        $charts = $this->feedback->chart();
        //$queries = DB::getQueryLog();
        //dd($queries);
        //dd($charts);
        return view('feedback.feedback_chart',compact('charts'));
    }

    public function create()
    {
        $cursos = $this->curso->get();
        $quesitos = $this->quesito->get();
        
        //dd($cursos);
        return view('feedback.feedback_create', compact(['cursos','quesitos']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $messages = [
            'nome.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo email é obrigatório!',
        ];
        
        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
        ], $messages);
        $quesitos = $this->quesito->get();
        
        
        $feedback = $this->feedback;
        $feedback->nome = $request->nome;
        $feedback->email = $request->email;
        $feedback->curso_id = $request->curso_id;
        $feedback->comentario = $request->comentario;
        $feedback->save();
        
        $idQuesito = 1;
        
        foreach($quesitos as $quesito){
            $feedback->quesitos()->attach($quesito->id, ['nota' => $request->input('quesito_' . $idQuesito)]);
            $idQuesito++;
        }

        //email - inicio
        $name = $feedback->nome;
        $email = $feedback->email;
        $email_copia1 = 'andr@andr.com.br';
        $email_copia2 = 'andre.reis@educsi.com.br';
        $text2bin = $this->text2bin->str2bin($name);

        $data = array(
            'name' => $name,
            'email' => $email,
            'email_copia1' => $email_copia1,
            'email_copia2' => $email_copia2,
            'text2bin' => $text2bin,
        );
        
        Mail::send('feedback.feedback_email', $data, function ($message) use ($name, $email, $email_copia1, $email_copia2, $text2bin)
        {
            $message->subject('CSI - Feedback semana profissionalizante');
            $message->from('no_reply@andr.com.br', 'CSI - Feedback semana profissionalizante');
            $message->to($email, $name);
            $message->bcc($email_copia1);
            if($email_copia2) {
                $message->bcc($email_copia2);
            }
 
        });
        //email - fim

        return redirect()->route('feedback.create')->with('message', 'Feedback criado com sucesso!');
    }

    /*
    public function teste(){   
        
        $name = 'Nome do usuario';
        $email = 'andr@andr.com.br';
        $email_copia1 = 'anesdosreis@gmail.com';
        $email_copia2 = 'andre.reis@educsi.edu.br';
        $text2bin = $this->text2bin->str2bin($name);

        $data = array(
            'name' => $name,
            'email' => $email,
            'email_copia1' => $email_copia1,
            'email_copia2' => $email_copia2,
            'text2bin' => $text2bin,
        );
        
        Mail::send('feedback.feedback_email', $data, function ($message) use ($name, $email, $email_copia1, $email_copia2, $text2bin)
        {
            $message->subject('CSI - Feedback semana profissionalizante');
            $message->from('no_reply@agerio.com.br', 'CSI - Feedback semana profissionalizante');
            $message->to($email, $name);
            $message->bcc($email_copia1);
            if($email_copia2) {
                $message->bcc($email_copia2);
            }
 
        });

        return view('feedback');
    }
    */

}