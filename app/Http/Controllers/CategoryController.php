<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * @param string $category
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function index(string $category = 'moon')
    {
        $categories = Category::pluck('name')->toArray();

        if (!in_array($category, $categories)) {
            return redirect()->route('index', 'moon');
        }

        // Fetch all categories
        $categories_data = Category::all();

        // Fetch events within 30 days
        $events_30 = DB::select("SELECT date,name, DATEDIFF(date, CURDATE()) re FROM events WHERE DATEDIFF(date, CURDATE()) <= 30 AND DATEDIFF(date, CURDATE()) > 0");

        // Fetch specific events for the given category
        $specificEvents = DB::select("SELECT events.name, events.date
FROM events
JOIN categories ON categories.id = events.categories_id
WHERE ? IN  (SELECT categories.name FROM categories) ", [$category]);

        return view('index', compact('categories_data', 'events_30', 'specificEvents'));
    }
}
