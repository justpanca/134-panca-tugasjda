<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Car;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::all();
        $activeTransaction = [];
        foreach ($transactions as $transaction) {
            if ($transaction['isActive']) {
                $transaction->renterName;
                $activeTransaction[] = $transaction;
            }
        }

        $selectedTransactions = [];
        if (session()->get('role_id') == 1) {
            $selectedTransactions = $activeTransaction;
        } else {
            $user_id = session()->get('id');
            foreach ($activeTransaction as $transaction) {
                if ($transaction['renter_id'] == $user_id) {
                    $selectedTransactions[] = $transaction;
                }
            }
        }

        return view('transaction', [
            "transactions" => $selectedTransactions
        ]);
    }

    public function store(Request $request) {
        $payload = $request->all();

        $startDate = strtotime($payload['start']);
        $endDate = strtotime($payload['return']);
        $diff = $endDate - $startDate;
        $days = ($diff / (60 * 60 * 24)) + 1;
        $totalPrice = $payload['price'] * $days;

        $newTransaction = [
            "carName" => $payload['name'],
            "carImage" => $payload['image'],
            "startDate" => $payload['start'],
            "returnDate" => $payload['return'],
            "totalPrice" => $totalPrice,
            "car_id" => $payload['id'],
            "renter_id" => $payload['renter_id']
        ];

        $transaction = Transaction::create($newTransaction);

        $updatedCar = [
            "isAvailable" => false
        ];

        $car = Car::findOrFail($payload['id']);
        $car->update($updatedCar);

        return redirect()->route('transaction');
    }

    public function update(Request $request) {
        $id = $request->all()['id'];
        $car_id = $request->all()['car_id'];
        $updatedTransaction = [
            "isActive" => false 
        ];

        $transaction = Transaction::findOrFail($id);
        $transaction->update($updatedTransaction);

        $updatedCar = [
            "isAvailable" => true
        ];

        $car = Car::findOrFail($car_id);
        $car->update($updatedCar);

        return redirect()->route('transaction');
    }
}
