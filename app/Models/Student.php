<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB,Session,DateTime;

class Student extends Model
{
	public function show($id)
	{
		return DB::table('Students')->select('stu_name')->where('stu_id', $id)->first();
	}

	
}