<?php

class BanksController extends \BaseController {

	/**
	 * Display a listing of banks
	 *
	 * @return Response
	 */
	public function index()
	{
		$banks = Bank::all();

		return View::make('banks.index', compact('banks'));
	}

	/**
	 * Show the form for creating a new bank
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('banks.create');
	}

	/**
	 * Store a newly created bank in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Bank::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Bank::create($data);

		return Redirect::route('banks.index');
	}

	/**
	 * Display the specified bank.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$bank = Bank::findOrFail($id);

		return View::make('banks.show', compact('bank'));
	}

	/**
	 * Show the form for editing the specified bank.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bank = Bank::find($id);

		return View::make('banks.edit', compact('bank'));
	}

	/**
	 * Update the specified bank in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$bank = Bank::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Bank::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$bank->update($data);

		return Redirect::route('banks.index');
	}

	/**
	 * Remove the specified bank from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Bank::destroy($id);

		return Redirect::route('banks.index');
	}

}
