<?php

declare(strict_types=1);

namespace  App\Services\Blockchain\Networks\ARK;

use App\Contracts\Network;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

final class Development implements Network
{
    public function knownWallets(): array
    {
        return Cache::rememberForever(
            'ark.development.wallets.known',
            fn () => Http::get('https://raw.githubusercontent.com/ArkEcosystem/common/master/devnet/known-wallets.json')->json()
        );
    }
}
