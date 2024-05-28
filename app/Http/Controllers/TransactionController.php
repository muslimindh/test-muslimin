<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function store(Request $request){
        DB::beginTransaction();
        try{
            $transaction = Transaction::create($request->all());
            DB::commit();
            return response()->json([
                'success' => true,
                'data' => $transaction,
                'message' => 'Berhasil menambahkan transaksi'
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
            ], 500);
        }
    }

    public function index(){
        DB::beginTransaction();
        try{
            $transactions = Transaction::all();
            DB::commit();
            return response()->json([
                'success' => true,
                'data' => $transactions,
                'message' => 'Berhasil mendapatkan data'
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
            ], 500);
        }
    }

    public function show($id){
        DB::beginTransaction();
        try{
            $transaction = Transaction::findOrFail($id);
            DB::commit();
            return response()->json([
                'success' => true,
                'data' => $transaction,
                'message' => 'Berhasil mendapatkan data'
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
            ], 500);
        }
    }

    public function update(Request $request, $id){
        DB::beginTransaction();
        try{
            $transaction = Transaction::findOrFail($id);
            $transaction->update($request->all());
            DB::commit();
            return response()->json([
                'success' => true,
                'data' => $transaction,
                'message' => 'Berhasil update data'
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
            ], 500);
        }
    }

    public function destroy($id){
        DB::beginTransaction();
        try{
            Transaction::destroy($id);
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil menghapus data'
            ], 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
            ], 500);
        }
    }
}
