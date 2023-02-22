<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use http\Client\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonials::all();
        return response()->json($testimonials);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id' =>'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $testimonials = Testimonials::create($input);
        return response()->json($testimonials);
    }

    public function show($id)
    {
        $testimonials = Testimonials::find($id);
        if (is_null($testimonials)) {
            return $this->sendError('Post does not exist.');
        }
        return response()->json($testimonials);
    }

    public function update(Request $request, Testimonials $testimonials)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id' =>'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $testimonials->title = $input['title'];
        $testimonials->description = $input['description'];
        $testimonials->save();

        return response()->json($testimonials);

    }

    public function destroy(Testimonials $blog)
    {
        $blog->delete();
        return $this->sendResponse([], 'Post deleted.');
    }}
