<?php
// app/Http//Controllers/RiwayatTransaksi/RiwayatAdmin
namespace App\Http\Controllers\RiwayatTransaksi;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class RiwayatAdmin extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('user', 'product')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.transactions.index', compact('transactions'));
    }
}
?>
