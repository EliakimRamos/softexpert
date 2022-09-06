<?php

namespace Controller;

use App\Profile;

class ProfileController {

    private Profile $profile;

    public function __construct()
    {
        $this->profile = new Profile();
    }

    public function GetProfile($payload)
    {
        if (!empty($payload['id'])) {
            $retorno = $this->profile->GetProfileById($payload);
            if (!empty($retorno)) {
                return $retorno;
            } else {
                return  http_response_code(401);
            }
        } else {
            return http_response_code(400);
        }
    }

    public function Profiles()
    {
            $retorno = $this->profile->SelectAll();
            if (!empty($retorno)) {
                return $retorno;
            } else {
                return  http_response_code(401);
            }
    }
    
    public function InsertProfile($payload)
    {
           if(!empty($payload['name'])) {
                $retorno = $this->profile->Insert($payload);
                if (!empty($retorno)) {
                    return $retorno;
                } else {
                    return  http_response_code(401);
                }
           } else {
             return  http_response_code(401);
          }
    }

    public function UpdateProfile($payload)
    {
           if(!empty($payload['name'])) {
                $retorno = $this->profile->Update($payload);
                if (!empty($retorno)) {
                    return $retorno;
                } else {
                    return  http_response_code(401);
                }
           } else {
             return  http_response_code(401);
          }
    }
}