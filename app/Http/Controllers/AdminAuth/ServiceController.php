<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Service::query();

            if ($request->status !== null && $request->status !== '') {
                $query->where('status', $request->status);
            }

            if ($request->date_range) {
                $dates = explode(' to ', $request->date_range);
                if (count($dates) === 2) {
                    $query->whereBetween('created_at', [$dates[0], $dates[1]]);
                }
            }

            return datatables()->of($query)
                ->addColumn('action', function ($row) {
                    $editUrl = route('backend.services.edit', $row->id);
                    return '
                        <a href="'.$editUrl.'" class="btn btn-sm btn-warning me-2"><i class="ri-edit-line"></i></a>
                        <button class="btn btn-sm btn-danger delete-service" data-id="'.$row->id.'">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('backend.services.index');
    }


    public function create()
    {
        return view('backend.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('backend.services.index')->with('success', 'Service created successfully!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('backend.services.create', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('backend.services.index')->with('success', 'Service updated successfully!');
    }
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('backend.services.index')->with('success', 'Service deleted successfully!');
    }
}
