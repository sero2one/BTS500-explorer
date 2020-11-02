<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Contracts\TransactionRepository;
use Illuminate\Cache\TaggedCache;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

final class TransactionRepositoryWithCache implements TransactionRepository
{
    use Concerns\ManagesCache;

    private TransactionRepository $transactions;

    public function __construct(TransactionRepository $transactions)
    {
        $this->transactions = $transactions;
    }

    public function allByWallet(string $address, string $publicKey): Collection
    {
        return $this->remember(fn () => $this->transactions->allByWallet($address, $publicKey));
    }

    public function allBySender(string $publicKey): Collection
    {
        return $this->remember(fn () => $this->transactions->allBySender($publicKey));
    }

    public function allByRecipient(string $address): Collection
    {
        return $this->remember(fn () => $this->transactions->allByRecipient($address));
    }

    private function getCache(): TaggedCache
    {
        return Cache::tags('transactions');
    }
}