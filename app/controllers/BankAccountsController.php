<?php

class BankAccountsController extends \BaseController {

	/**
	 * Display a listing of bankaccounts
	 *
	 * @return Response
	 */
	public function index()
	{
		$bankaccounts = Bankaccount::all();

		return View::make('bankaccounts.index', compact('bankaccounts'));
	}

	/**
	 * Show the form for creating a new bankaccount
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('bankaccounts.create');
	}

	/**
	 * Store a newly created bankaccount in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Bankaccount::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Bankaccount::create($data);

		return Redirect::route('bankaccounts.index');
	}

	/**
	 * Display the specified bankaccount.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bankaccount = Bankaccount::findOrFail($id);

		return View::make('bankaccounts.show', compact('bankaccount'));
	}

	/**
	 * Show the form for editing the specified bankaccount.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bankaccount = Bankaccount::find($id);

		return View::make('bankaccounts.edit', compact('bankaccount'));
	}

	/**
	 * Update the specified bankaccount in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bankaccount = Bankaccount::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Bankaccount::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$bankaccount->update($data);

		return Redirect::route('bankaccounts.index');
	}

	/**
	 * Remove the specified bankaccount from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bankaccount::destroy($id);

		return Redirect::route('bankaccounts.index');
	}

}
