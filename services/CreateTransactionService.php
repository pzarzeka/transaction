<?php
//declare(strict_types=1);

namespace Services;

use App\Exceptions\AccountDoesntExistException;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CreateTransactionService
{

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     * @throws AccountDoesntExistException
     */
    public function run(Request $request)
    {
        $account = Account::find($request->get('account_id'));
        if (!$account instanceof Account) {
            throw new AccountDoesntExistException();
        }

        $transaction = Transaction::find($request->header('Transaction-Id'));
        if ($transaction instanceof Transaction) {
            return $transaction;
        }

        $transaction = $account->transactions()->create([
            'account_id' => $account->id,
            'amount' => $request->get('amount'),
            'id' => $request->header('Transaction-Id')
        ]);

        $account->setBalance($account->getBalance() + $request->get('amount'));
        $account->save();

        return $transaction;
    }

}