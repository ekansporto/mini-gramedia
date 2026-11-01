<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPackage;
use App\Models\Book;
use Yajra\DataTables\Facades\DataTables;
use App\Models\SubscriptionPackageBook;

class SubscriptionPackageBookController extends Controller
{
    public function show($subscriptionPackageId, Request $request)
    {
        $subscriptionPackage = SubscriptionPackage::findOrFail($subscriptionPackageId);

        if ($request->ajax()) {
            $model = Book::with('bookCategory');

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('coverImg', function ($row) {
                    return '<img src="' . asset($row->cover) . '" width="100"class="d-block mx-auto"/>';
                })
                ->editColumn('price', function ($row) {
                    return 'Rp ' . number_format($row->price, 0, ',', '.');
                })
                ->editColumn('category', function ($row) {
                    return $row->bookCategory->name;
                })
                ->addColumn('checkAdded', function ($row) use ($subscriptionPackage) {
                    $subscriptionPackageBook = $subscriptionPackage->subscriptionPackageBooks()->pluck('book_id')->toArray();
                    return in_array($row->id, $subscriptionPackageBook) ? 'Ya' : 'Tidak';
                })
                ->rawColumns(['coverImg', 'checkAdded'])
                ->toJson();
        }
        return view('admin.subscription-package.books', compact('subscriptionPackage'));
    }
    public function store(Request $request, $id)
    {
        $bookIds = $request->book_ids;

        foreach ($bookIds as $bookId) {
            SubscriptionPackageBook::create([
                'subscription_package_id' => $id,
                'book_id' => $bookId,
                'expired_date' => now()->addMonth()
            ]);
        }

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan ke paket langganan');
    }
}
