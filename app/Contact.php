<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Contact extends Model
{
    protected $fillable = [
        'name', 'email', 'mobile', 'comment'
    ];

    public function getAllContactList()
    {
        return Contact::where('is_deleted', 0)->latest('created_at')->get();
    }

    public function saveContact(Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('name', 'email', 'mobile', 'comment');
        $saveResult = Contact::create($data);
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }

    public function deleteContact(Contact $contact, Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $contact->is_deleted = 1;
        $saveResult = $contact->save();
        if($saveResult){
            DB::commit();
        }else{
            DB::rollBack();
        }
        return $saveResult;
    }
}
