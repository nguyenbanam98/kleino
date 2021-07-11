<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::query()->count();
        $articles = Article::query()->whereDate('created_at', '>', Carbon::now()->subMonth())->count();
        $users = Customer::query()->count();
        $transactions = Transaction::query()->whereDate('created_at', '>', Carbon::now()->subMonth())->where('status', 3)->count();

        return view('admin.index', compact('admins', 'articles', 'users', 'transactions'));
    }
}
