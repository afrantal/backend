<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use Validator;


class ProductController extends BaseController
{

    public function index()
    {
        $tasks = Product::all();
        return $this->handleResponse(ProductResource::collection($tasks), 'Products have been retrieved!');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'product_name' => 'required',
            'price' => 'required',
            'material' => 'required',
            'created' => 'required'
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        $task = Product::create($input);
        return $this->handleResponse(new ProductResource($task), 'Product created!');
    }

   
    public function show($id)
    {
        $task = Product::find($id);
        if (is_null($task)) {
            return $this->handleError('Product not found!');
        }
        return $this->handleResponse(new ProductResource($task), 'Product has retrieved.');
    }
    

    public function update(Request $request, $id)
    {
        $task = Product::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'product_name' => 'required',
            'price' => 'required',
            'material' => 'required',
            'created' => 'required'
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }

        $task->product_name = $input['product_name'];
        $task->price = $input['price'];
        $task->material = $input['material'];
        $task->created = $input['created'];
        $task->save();
        
        return $this->handleResponse(new ProductResource($task), 'Product successfully updated!');
    }
   
    public function destroy($id) //Product $task
    {
        $task = Product::find($id);
        $task->delete();
        return $this->handleResponse([], 'Product deleted!');
    }


}