<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Status;
use Auth;

class StatusController extends Controller
{
	public function status(Request $request)
	{
		Auth::user()->statuses()->create([
			'body' => $request->input('status'),
			'parent_id' => null
		]);

		return view('layouts.status', ['status' => Auth::user()->statuses()->notReply()->orderBy('created_at', 'desc')->first()]);
	}

	public function reply(Request $request, $statusId)
	{
		$status = Status::notReply()->find($statusId);
		$user =  $status->_user();

		$reply = Status::create([
			'body' => $request->input('reply-'.$statusId),
		]);

		$reply->user()->associate(Auth::user());
		$status->replies()->save($reply);

		return view('layouts.replies', ['reply' => Auth::user()->statuses()->whereNotNull('parent_id')
															   ->orderBy('created_at', 'desc')->first()]);
	}
}
