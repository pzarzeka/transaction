<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaxTransactionVolume extends Model
{
    use HasFactory;

    /**
     * @var int
     */
    public $maxVolume;

    /**
     * @var array
     */
    public $accounts;

    /**
     * @return int
     */
    public function getMaxVolume()
    {
        return $this->maxVolume;
    }

    /**
     * @param int $maxVolume
     */
    public function setMaxVolume($maxVolume)
    {
        $this->maxVolume = $maxVolume;
    }

    /**
     * @return array
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

    /**
     * @param array $accounts
     */
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
    }

}
