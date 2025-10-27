<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Banner::select(['id', 'title', 'subtitle', 'image', 'is_active', 'created_at']);

            if ($request->filled('title')) {
                $query->where('title', 'like', '%' . $request->input('title') . '%');
            }
            if ($request->filled('date_range')) {
                $dates = explode(' to ', $request->input('date_range'));
                if (count($dates) === 2) {
                    $query->whereBetween('created_at', [$dates[0] . ' 00:00:00', $dates[1] . ' 23:59:59']);
                }
            }

            return DataTables::of($query)
                ->addColumn('image_display', function (Banner $banner) {
                    if ($banner->image) {
                        $url = Storage::url($banner->image);
                        return '<img src="' . $url . '" alt="Banner Image" style="width: 100px; height: auto;">';
                    }
                    return 'No Image';
                })
                ->addColumn('status', function (Banner $banner) {
                    $class = $banner->is_active ? 'success' : 'danger';
                    $text = $banner->is_active ? 'Active' : 'Inactive';
                    return '<span class="badge bg-' . $class . '">' . $text . '</span>';
                })
                ->addColumn('action', function (Banner $banner) {
                    $editUrl = route('backend.banners.edit', $banner->id);
                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-info me-2"><i class="ri-edit-line"></i></a>' .
                        '<button type="button" class="btn btn-sm btn-danger delete-banner" data-id="' . $banner->id . '"><i class="ri-delete-bin-line"></i></button>';
                })
                ->rawColumns(['image_display', 'status', 'action'])
                ->make(true);
        }

        return view('backend.banners.index');
    }

    public function create()
    {
        return view('backend.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|url|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'is_active' => 'boolean',
        ]);

        $imagePath = $request->file('image')->store('backend/uploads/banners', 'public');

        Banner::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'image' => $imagePath,
            'is_active' => $request->boolean('is_active', false),
        ]);

        return redirect()->route('backend.banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('backend.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'is_active' => 'boolean',
        ]);

        $imagePath = $banner->image;
        if ($request->hasFile('image')) {
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
            $imagePath = $request->file('image')->store('backend/uploads/banners', 'public');
        }

        $banner->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'image' => $imagePath,
            'is_active' => $request->boolean('is_active', false),
        ]);

        return redirect()->route('backend.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function destroy(Banner $banner)
    {
        try {
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }
            $banner->delete();
            return response()->json(['success' => true, 'message' => 'Banner deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete banner.'], 500);
        }
    }
}