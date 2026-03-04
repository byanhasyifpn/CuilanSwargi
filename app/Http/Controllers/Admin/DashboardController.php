<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Accommodation;
use App\Models\Article;
use App\Models\Booking;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $galleryCount = Gallery::count();
        $accommodationCount = Accommodation::count();
        $articleCount = Article::count();
        $publishedArticleCount = Article::where('is_published', true)->count();
        $bookingCount = Booking::count();
        $pendingBookingCount = Booking::where('status', 'pending')->count();
        
        return view('admin.dashboard', compact(
            'galleryCount', 
            'accommodationCount', 
            'articleCount',
            'publishedArticleCount',
            'bookingCount',
            'pendingBookingCount'
        ));
    }
}