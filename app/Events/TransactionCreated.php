<?php
// app/Events/TransactionCreated.php
namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class TransactionCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;
    public $quantity;
    public $userId;

    public function __construct($userId, Product $product, $quantity)
    {
        $this->userId = $userId;
        $this->product = $product;
        $this->quantity = $quantity;

        Log::info('Event TransactionCreated: ', ['user_id' => $userId, 'product' => $product, 'quantity' => $quantity]);
    }
}

?>