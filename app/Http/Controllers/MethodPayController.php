<?php

namespace App\Http\Controllers;

use App\Models\methodPay as paymentMethod;
use Illuminate\Http\Request;

class MethodPayController extends Controller
{
    public function getPaymentMethod()
    {
        return response()->json(paymentMethod::all(), 200);
    }

    public function getPaymentMethodById($id)
    {
        $paymentMethod = paymentMethod::find($id);
        if(is_null($paymentMethod)){
            return response()->json(['message' => 'Payment Method not found'], 404);
        }
        return response()->json($paymentMethod::find($id), 200);
    }

    public function addPaymentMethod(Request $request)
    {
        $request->validate([
            'numTarjeta' => 'required|max:17',
            'fechaVencimiento' => 'required',
            'cvv' => 'required|max:6',
            'price' => 'required',
            'idUser' => 'required|exists:users,id'
        ]);
        $paymentMethod = paymentMethod::create($request->all());
        return response($paymentMethod, 201);
    }

    public function updatePaymentMethod(Request $request, $id)
    {
        $paymentMethod = paymentMethod::find($id);
        if(is_null($paymentMethod)){
            return response()->json(['message' => 'Payment Method not found'], 404);
        }
        $paymentMethod->update($request->all());
        return response($paymentMethod, 200);
    }

    public function deletePaymentMethod($id)
    {
        $paymentMethod = paymentMethod::find($id);
        if(is_null($paymentMethod)){
            return response()->json(['message' => 'Payment Method not found'], 404);
        }
        $paymentMethod->delete();
        return response()->json(['message' => 'Payment Method deleted', null], 204);
    }
}
