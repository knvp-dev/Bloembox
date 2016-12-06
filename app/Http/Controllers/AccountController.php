<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\AccountRepository;
use App\Http\Requests\CreateAccountRequest;
use App\Jobs\SendRegisterConfirmationEmail;

class AccountController extends Controller
{
    protected $account;

    /**
     * Class constructor with UserRepository injected
     *
     */
    public function __construct(AccountRepository $account) {
        $this->account = $account;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('pages.account.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAccountRequest $request){

        $createdAccount = $this->account->create($request);
        
        if(!$createdAccount) {            
            return redirect()->back()->withErrors(['Er is iets foutgelopen tijdens het registeren. Probeer later opnieuw.']);
        }
        $this->dispatch(new SendRegisterConfirmationEmail($createdAccount));
        return view('pages.account.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        return view('pages.account.index')->with('account',$this->account->getAccount());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(){
        return view('pages.account.edit')->with('account',$this->account->getAccount());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        if($this->account->update($request)){
            return redirect('/account');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }

    /**
     * Verify user confirmation code
     */
    public function verify($email,$confirmation_code){
        // verify account
        $accountVerificationState = collect($this->account->verify($email, $confirmation_code));
        return view('pages.account.verify', compact('accountVerificationState'));
    }

    public function showOrders(){
        $orders = $this->account->getAllOrders();
        return view('pages.account.orders')->with('orders',$orders);
    }
}
