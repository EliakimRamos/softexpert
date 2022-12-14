<?php

namespace Controller;


use App\User;

class UserController {

    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function Login($payload)
    {
        if (!empty($payload['login']) && !empty($payload['password'])) {
            $senhaAux = md5($payload['password']);
            $payload['password'] = $senhaAux;
            $retorno = $this->user->Login($payload);
            if (!empty($retorno)) {
                return $retorno;
            } else {
                return  http_response_code(401);
            }
        } else {
            return http_response_code(400);
        }
    }

    public function GetUserById($payload)
    {
        if (!empty($payload['id'])) {
            $retorno = $this->user->GetUserById($payload);
            if (!empty($retorno)) {
                return $retorno;
            } else {
                return  http_response_code(401);
            }
        } else {
            return http_response_code(400);
        }
    }

    public function GetAllUser()
    {
        $retorno = $this->user->SelectAll();
        if (!empty($retorno)) {
            return $retorno;
        } else {
            return  http_response_code(401);
        }
    }

    public function InsertUser($payload)
    {
        if(!empty($payload['profile_id']) && !empty($payload['name']) && !empty($payload['login']) && !empty($payload['password'])) {
            $passwordAux = md5($payload['password']);
            $payload['password'] = $passwordAux;
            $retorno = $this->user->Insert($payload);
            if (!empty($retorno)) {
                return $retorno;
            } else {
                return  http_response_code(401);
            }
        } else {
            return http_response_code(400);
        }
    }

    public function UpdateUser($payload)
    {
        if(!empty($payload['profile_id']) && !empty($payload['name']) && !empty($payload['login']) && !empty($payload['user_id'])) {
            if(!empty($payload['password'])){
                $passwordAux = md5($payload['password']);
                $payload['password'] = $passwordAux;
            }
            
            $retorno = $this->user->Update($payload);
            if (!empty($retorno)) {
                return $retorno;
            } else {
                return  http_response_code(401);
            }
        } else {
            return http_response_code(400);
        }
    }
}