<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;
use Postmark\PostmarkClient;
use Postmark\Models\PostmarkException;
use SendGrid\Mail\Mail;


class UserController extends Controller
{

      /**
     * Shortcut for (index())
     * auth user credentials    
     * 
     */
    public function authenticate(Request $request)
    {
      $credentials = $request->only('email', 'password');
      try {
          if (! $token = JWTAuth::attempt($credentials)) {
              return response()->json(['error' => 'invalid_credentials'], 400);
          }
      } catch (JWTException $e) {
          return response()->json(['error' => 'could_not_create_token'], 500);
      }
      
        //  send email if came of web.
        
        if($request->post('action') == 'web') {
            $data = array('mensaje' => "Your token is '{$token}'.");

            $email = new Mail();
    
            $email->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $email->setSubject("Correo de prueba");
            $email->addTo(env('MAIL_FROM_ADDRESS'), "Destinatario");
            $email->addContent("text/html", view('email', $data)->render());
    
            $sendgrid = new \SendGrid(env('MAIL_PASSWORD'));
    
            try {
                $response = $sendgrid->send($email);
    
                if ($response->statusCode() == 202) {
                    return response()->json(['success' => true, 'message' => 'The email was send susccessfully.']);
                } else {
                    return response()->json(['success' => false, 'message' => 'Error, Email do not send.']);
                }
            } catch (Exception $e) {
                return response()->json(['success' => false, 'message' => 'Error, Email do not send: ' . $e->getMessage()]);
            }

        }else{
            return response()->json(["token" => $token],200);
        }

        
    }

      /**
     * Shortcut for (index())
     * retrieven user authenticated
     * 
     */
    public function getAuthenticatedUser()
    {
        try {
          if (!$user = JWTAuth::parseToken()->authenticate()) {
                  return response()->json(['user_not_found'], 404);
          }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }

      /**
     * Shortcut for (index())
     * register users
     * 
     */
    public function register(Request $request)
    {

        Log::info($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),200);
    }

}
