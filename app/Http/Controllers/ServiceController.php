<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $categories = ServiceCategory::active()->ordered()->with(['services' => function($query) {
            $query->active()->ordered();
        }])->get();

        // Build query for services
        $query = Service::active()->with('category');

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Sort functionality
        switch ($request->sort) {
            case 'price_low':
                $query->orderBy('base_price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('base_price', 'desc');
                break;
            case 'duration':
                $query->orderBy('estimated_duration', 'asc');
                break;
            case 'name':
            default:
                $query->orderBy('name', 'asc');
                break;
        }

        $services = $query->paginate(12)->withQueryString();

        return view('customer.services', compact('categories', 'services'));
    }

    public function show(Service $service)
    {
        $service->load('category');
        return view('customer.service-details', compact('service'));
    }
}
