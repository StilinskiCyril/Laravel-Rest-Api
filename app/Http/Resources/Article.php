<?php

namespace App\Http\Resources;

use http\Env\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return all the fields
        return parent::toArray($request);
        //Only return specific fields
//        return [
//            'id' => $this->id,
//            'title' => $this->title,
//            'body' => $this->body
//        ];
    }

    //extra info to return with the request
    public function with($request)
    {
        return [
            'verion' => '2.0.0.4',
            'author' => 'IamStilinski'
        ];
    }
}
