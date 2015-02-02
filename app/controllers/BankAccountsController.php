<?php

class BankAccountsController extends \BaseController {

	/**
	 * GET /accounts/banks
	 * Display a listing of bank accounts
	 *
	 * @return Response JSON object
	 */
	public function index()
	{
		$bankaccounts = Bankaccount::all();

		return View::make('bankaccounts.index', compact('bankaccounts'));
	}

	/**
	 * GET /accounts/banks/create
	 * Show the form for creating a new bank account
	 *
	 * @return View Laravel view
	 */
	public function create()
	{
		return View::make('bankaccounts.create');
	}

	/**
	 * POST /accounts/banks
	 * Store a newly created bank account in storage.
	 *
	 * @return Response JSON object
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
	 * GET /accounts/banks/{id}
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
