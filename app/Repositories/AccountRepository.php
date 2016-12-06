<?php

namespace App\Repositories;

use Auth;
use App\User;
use App\Order;

use App\Http\Requests\CreateAccountRequest;

class AccountRepository {

	protected $account;

	public function __construct(){
		$this->account = Auth::user();
	}

	public function getAccount(){
		return $this->account;
	}

	public function update($request){
		$this->account->update($request->all());
		$this->account->save();
		return $this->account;
	}

	public function create(CreateAccountRequest $request){

		$request['password'] = bcrypt($request['password']);

		$this->account = User::create($request->all());
		$this->account->confirmation_code = str_random(30);
		$this->account->save();

		return $this->account;
		
	}

	public function verify($email, $confirmation_code){

		$account = User::whereEmail($email)->first();
		
		if($account && !$account->confirmed){
			if($account->confirmation_code === $confirmation_code){
				$account->confirmAccount();
				$this->login($account);
				return [
					'state' => 'success',
					'title' => 'Account is geactiveerd',
					'message' => 'Uw account is nu volledig geactiveerd! Veel winkelplezier.'
				];
			}else{
				return [
					'state' => 'failed',
					'title' => 'Activatiecode niet geldig',
					'message' => 'De activatiecode is niet geldig of is verlopen.'
				];
			}
		}else if(!$account){
			return [
				'state' => 'failed',
				'title' => 'Account bestaat niet',
				'message' => 'Er bestaat nog geen account voor "' . $email . '".'
			];
		}
		return [
			'state' => 'success',
			'title' => 'Account is reeds geactiveerd',
			'message' => 'Uw account is reeds geactiveerd.'
		];
	}

	public function login($account){
		Auth::attempt(['email'=>$account->email,'password'=>$account->password]);
		Auth::login($account);
	}

	public function getAllOrders(){
		return Order::whereUserId(Auth::id())->get();
	}

}