<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $subscriptionPackages = SubscriptionPackage::latest()->take(3)->get();
        $latestBooks = Book::orderBy('created_at', 'desc')->limit(10)->get();
        $freeBooks = Book::where('price', 0)->orderBy('created_at', 'desc')->limit(6)->get();

        return view('home', compact('subscriptionPackages', 'latestBooks', 'freeBooks'));
    }

    public function category(BookCategory $category, Request $request)
    {
        $query = trim((string) $request->input('q', ''));
        $sort = $request->input('sort', 'newest');

        $books = $category->books()
            ->when($query !== '', function ($queryBuilder) use ($query) {
                $queryBuilder->where(function ($builder) use ($query) {
                    $builder->where('title', 'like', '%' . $query . '%')
                        ->orWhere('writer', 'like', '%' . $query . '%');
                });
            })
            ->when($sort === 'price_asc', fn($queryBuilder) => $queryBuilder->orderBy('price', 'asc'))
            ->when($sort === 'price_desc', fn($queryBuilder) => $queryBuilder->orderBy('price', 'desc'))
            ->when($sort === 'newest', fn($queryBuilder) => $queryBuilder->orderBy('created_at', 'desc'))
            ->get();

        return view('category_books', compact('category', 'books', 'query', 'sort'));
    }

    public function search(Request $request)
    {
        $query = trim((string) $request->input('q', ''));

        $books = Book::query()
            ->when($query !== '', function ($bookQuery) use ($query) {
                $bookQuery->where(function ($builder) use ($query) {
                    $builder->where('title', 'like', '%' . $query . '%')
                        ->orWhere('writer', 'like', '%' . $query . '%');
                });
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('search_result', compact('books', 'query'));
    }
}
