<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;

class account extends Controller
{
    public function index()
    {
        $accounts = Register::all();
        return view('admin/accLogin', compact('accounts'));
    }

    public function delete($id)
    {
        $account = Register::findOrFail($id);
        $account->delete();

        return redirect()->route('admin.account')->with('delete', 'Account deleted successfully');
    }
}
