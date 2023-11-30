<?php

namespace BelajarBackend\Controller;

include "BelajarBackend/Traits/ApiResponseFormatter.php";
include "BelajarBackend/Models/Product.php";

use BelajarBackend\Models\Product;
use BelajarBackend\Traits\ApiResponseFormatter;

class ProductController
{
    use ApiResponseFormatter;

    public function index()
    {
        $productModel = new Product();
        $response = $productModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $productModel = new Product();
        $response = $productModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        $jsoninput = file_get_contents('php://input');
        $inputdata = json_decode($jsoninput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "err inv input", null);
        }

        $productModel = new Product();
        $response = $productModel->create([
            "product_name" => $inputdata['product_name']
        ]);

        return $this->apiResponse(200, "success", $response);
    }

    public function update($id)
    {
        $jsoninput = file_get_contents('php://input');
        $inputdata = json_decode($jsoninput, true);
        if (json_last_error()) {
            return $this->apiResponse(400, "err inv input", null);
        }

        $productModel = new Product();
        $response = $productModel->update([
            "product_name" => $inputdata['product_name']
        ], $id);

        return $this->apiResponse(200, "success", $response);
    }

    public function delete($id)
    {
        $productModel = new Product();
        $response = $productModel->destroy($id);
        return $this->apiResponse(200, "success", $response);
    }
}
