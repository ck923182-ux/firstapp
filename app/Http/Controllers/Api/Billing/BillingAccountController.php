<?php

namespace App\Http\Controllers\Api\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillingAccount;

class BillingAccountController extends Controller
{
    // GET /api/billing-accounts
    public function index()
    {
        return response()->json(BillingAccount::all());
    }

    // GET /api/billing-accounts/{id}
    public function show($id)
    {
        $account = BillingAccount::find($id);
        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }
        return response()->json($account);
    }

    // POST /api/billing-accounts
    public function store(Request $request)
    {
        $data = $request->validate([
            'account_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'balance' => 'nullable|numeric',
        ]);

        $account = BillingAccount::create($data);
        return response()->json($account, 201);
    }

    // PUT /api/billing-accounts/{id}
    public function update(Request $request, $id)
    {
        $account = BillingAccount::find($id);
        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        $account->update($request->all());
        return response()->json($account);
    }

    // DELETE /api/billing-accounts/{id}
    public function destroy($id)
    {
        $account = BillingAccount::find($id);
        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        $account->delete();
        return response()->json(['message' => 'Account deleted successfully']);
    }
}
