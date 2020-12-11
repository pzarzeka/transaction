<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\AccountDoesntExistException;
use App\Exceptions\ValidationFailedException;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Services\CreateTransactionService;

class ApiController extends BaseController
{

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function ping()
    {
        return response(
            ['description' => 'The service is up and running.'],
            200
        );
    }

    public function createTransaction(Request $request, CreateTransactionService $service)
    {
        try {
            DB::beginTransaction();
            $service->run($request);
            DB::commit();
        } catch (AccountDoesntExistException | ValidationFailedException $exception) {
            DB::rollBack();

            return response(
                ['description' => $exception->getMessage()],
                $exception->getCode()
            );
        }

        return response(
            ['description' => 'Transaction created'],
            200
        );
    }

    public function getTransaction(Request $request)
    {

    }

    public function getAccountBalance(Request $request)
    {

    }

    public function getMaxTransactionVolume(Request $request)
    {

    }

}