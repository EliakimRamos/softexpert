<?php

namespace Controller;

use App\ProductType;

class ProductTypeController {

    private ProductType $productType;

    public function __construct()
    {
        $this->productType = new ProductType();
    }

    public function GetProductType($payload)
    {
        if (!empty($payload['id'])) {
            $retorno = $this->productType->GetProductTypeById($payload);
            if (!empty($retorno)) {
                return $retorno;
            } else {
                return  http_response_code(401);
            }
        } else {
            return http_response_code(400);
        }
    }

    public function productTypes()
    {
            $retorno = $this->productType->SelectAll();
            if (!empty($retorno)) {
                return $retorno;
            } else {
                return  http_response_code(401);
            }
    }
    
    public function InsertProductType($payload)
    {
           if(!empty($payload['name'])) {
                $retorno = $this->productType->Insert($payload);
                if (!empty($retorno)) {
                    return $retorno;
                } else {
                    return  http_response_code(401);
                }
           } else {
             return  http_response_code(401);
          }
    }

    public function UpdateProductType($payload)
    {
           if(!empty($payload['name'])) {
                $retorno = $this->productType->Update($payload);
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