<?php

class WithdrawalsController extends \BaseController {

	/**
	 * Display a listing of withdrawals
	 *
	 * @return Response
	 */
	public function index()
	{
		$withdrawals = Withdrawal::all();

		return View::make('withdrawals.index', compact('withdrawals'));
	}

	/**
	 * Show the form for creating a new withdrawal
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('withdrawals.create');
	}

	/**
	 * Store a newly created withdrawal in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Withdrawal::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Withdrawal::create($data);

		return Redirect::route('withdrawals.index');
	}

	/**
	 * Display the specified withdrawal.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$withdrawal = Withdrawal::findOrFail($id);

		return View::make('withdrawals.show', compact('withdrawal'));
	}

	/**
	 * Show the form for editing the specified withdrawal.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$withdrawal = Withdrawal::find($id);

		return View::make('withdrawals.edit', compact('withdrawal'));
	}

	/**
	 * Update the specified withdrawal in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$withdrawal = Withdrawal::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Withdrawal::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$withdrawal->update($data);

		return Redirect::route('withdrawals.index');
	}

	/**
	 * Remove the specified withdrawal from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Withdrawal::destroy($id);

		return Redirect::route('withdrawals.index');
	}

}
