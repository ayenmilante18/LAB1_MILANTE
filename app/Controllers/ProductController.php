<?php


namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel; 
use App\Models\TableSectionModel; 

class ProductController extends BaseController
{
    private $product;
    private $tableSection; 

    public function __construct()
    {
        $this->product = new ProductModel();
        $this->tableSection = new TableSectionModel(); 
    }

    public function delete($id)
    {
        $this->product->delete($id);
        return redirect()->to('/product');
    }

    public function edit($id)
    {
        $data = [
            'product' => $this->product->findAll(),
            'pro' => $this->product->where('id', $id)->first(),
        ];

        if (!$data['pro']) {
            echo 'ERROR';
        }

        return view('products', $data);
    }

    public function save()
    {
        $id = $_POST['id'];
        $data = [
            'StudName' => $this->request->getVar('StudName'),
            'StudGender' => $this->request->getVar('StudGender'),
            'StudCourse' => $this->request->getVar('StudCourse'),
            'StudSection' => $this->request->getVar('StudSection'),
            'StudYear' => $this->request->getVar('StudYear'),
        ];

        if ($id != null) {
            $this->product->set($data)->where('id', $id)->update();
        } else {
            $this->product->save($data);
        }

        
        $sectionData = 
        [
            'StudSection' => $this->request->getVar('StudSection'),
        ];

        $this->tableSection->save($sectionData);

        return redirect()->to('/product');
    }

    public function product($product)
    {
        echo $product;
    }

    public function chalsim()
    {
        $data['product'] = $this->product->findAll();
        return view('products', $data);
    }

    public function index()
    {
        //
    }
}
