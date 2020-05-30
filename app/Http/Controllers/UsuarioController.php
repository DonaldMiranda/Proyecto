<?php
namespace App\Http\Controllers;
use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
Use Illuminate\Support\Facades\Mail;
Use App\Mail\TestMail;
use DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        return view('registro');
    }

    public function Login()
    {
        return view('login');
    }

    public function create(Request $request)
    {
        session_start();
        try{
            DB::beginTransaction();  
            $datos = $request->except(['_token','pass_confirm']);
            //Encriptacion de password 
            $password = password_hash($request->input('pass'),PASSWORD_BCRYPT,['cost'=>4]);
            //Datos de QR
            $Data_QR = array('usuario'=>$request->input('email'),'password'=>$request->input('pass'));
            //Encriptando Datos de QR
            $QR = Crypt::encrypt(json_encode($Data_QR));
            //GENERAR QR NOMBRE DE QR
            $qr_name = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,10);
            $file_path = public_path("QR/".$qr_name.".png");
            //INGRESA DATOS A DB
            $usuario = array('nombre'=>$request->input('nombre'),'apellido'=>$request->input('apellido'),'correo'=>$request->input('email'),'contrasena'=>$password,'qr_code'=>$qr_name.'.png');
      
             if(Usuario::insert($usuario)){
                        DB::commit();
                        QrCode::format('png')->size(512)->margin(0)->generate($QR,$file_path);
                        //ENVIAR CORREO
                        $full_name = $usuario['nombre']." ".$usuario['apellido'];
                        $email = new UsuarioController;
                        $QR = $qr_name.".png";
                       
                       if($email->SendEmailCode($full_name,$usuario['correo'],$QR))
                        {
                        
                            $_SESSION['status'] =array('estado'=>'success','titulo'=>'Registro Completado','mensaje'=>'Se han enviado el codigo QR a '.$usuario['correo']);
                            return redirect()->action('UsuarioController@index');
                        }else{
                      
                            $_SESSION['status'] = array('estado'=>'warning','titulo'=>'Poblemas de Red','mensaje'=>'Contactese con el administrador');
                            return redirect()->action('UsuarioController@index');
                        }
                      
              }else{
                session_start();
                $_SESSION['status'] =array('estado'=>'error','titulo'=>'ATENCION','mensaje'=>'No se ha podido registrar este usuario');
                return redirect()->action('UsuarioController@index');          
              }
          }catch(\Exception $e){
      
                 $_SESSION['status'] = array('estado'=>'warning','titulo'=>'ATENCION','mensaje'=>'Este correo ya esta registrado');         
                 return redirect()->action('UsuarioController@index');
           }
    }


    public function show(Usuario $usuario)
    {
        //
    }
    public function edit(Usuario $usuario)
    {
        //
    }

    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    public function destroy()
    {
        session_start();
        unset($_SESSION['user']);
        return redirect()->action('UsuarioController@index');
    }

    public  function SendEmailCode($user,$email,$qr){
        try{ 
        $to_name  = 'Sistema de Autenticacion QR';
        $to_email = $email;
        $data = array('name'=>$user, "body" => "Test mail","QR"=>$qr);
        Mail::send('emails.SendCode', $data, function($message) use ($to_name,$to_email){
        $message->to($to_email, $to_name)->subject('Codigo QR ');
        $message->from('don.miranda95@gmail.com','CODIGO DE USUARIO QR');
        });
           return true;
        } catch(\Exception $e){
           return false;
        }
    }

    public function SendEmailNotificacion($user,$email){
        $to_name  = 'Sistema de Autenticacion QR';
        $to_email = $email;
        $data = array('name'=>$user, "body" => "Te Notificamos que se ha iniciado sesion con tu codigo QR");
        Mail::send('emails.SendConfirmLogin', $data, function($message) use ($to_name,$to_email){
        $message->to($to_email, $to_name)->subject('Notifacion Inicio de Sesion');
        $message->from('don.miranda95@gmail.com','AUTENTICACION QR');
        });   
    }

    public  function verify_user(Request $request){
        if($request->ajax()){
            try{        
              $data = Crypt::decrypt($request->input('data'));;
              $credenciales = json_decode($data);
              $username = $credenciales->usuario;
              $pass = $credenciales->password;
              $datos = Usuario::where('correo','=',$username)->first();
              session_start();
               if(isset($datos) or !is_null($datos)){
                    if(password_verify($pass,$datos->contrasena)){
                          $email = new UsuarioController;
                          $email->SendEmailNotificacion($datos->nombre,$username);
                        
                          $_SESSION['user'] = array('user_id'=>$datos->id,'user'=>$datos->nombre);
                          $resultado = array("session"=>true);
                    }else{
                        $resultado = array("session"=>false);
                    }
               }else{
                    $resultado = array("session"=>404);
               }
                return response()->json($resultado);
            }catch(\Exception $e){                             
                DB::rollback();
                throw $e;
            } 
        }
    }
}
