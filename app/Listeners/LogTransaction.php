<?php 
// app/Listeners/LogTransaction.php
namespace App\Listeners;

use App\Events\TransactionCreated;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class LogTransaction
{
    public function __construct()
    {
        //
    }

    public function handle(TransactionCreated $event)
    {
        Log::info('Listener LogTransaction handle method triggered.');

        $transaction = Transaction::create([
            'user_id' => $event->userId,
            'product_id' => $event->product->id,
            'quantity' => $event->quantity,
            'total_price' => $event->product->harga * $event->quantity,
        ]);

        Log::info('Transaction created: ', $transaction->toArray());
    }
}
?> 