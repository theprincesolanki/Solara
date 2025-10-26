<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EnquiryController extends Controller
{

public function index(Request $request)
{
    if ($request->ajax()) {
        $query = Enquiry::select(['id', 'name', 'email', 'phone', 'subject', 'created_at']);

        if ($request->filled('subject')) {
            $query->where('subject', $request->subject);
        }

        if ($request->filled('date_range')) {
            $dates = explode(' to ', $request->date_range);
            if (count($dates) === 2) {
                $query->whereBetween('created_at', [
                    Carbon::parse($dates[0])->startOfDay(),
                    Carbon::parse($dates[1])->endOfDay()
                ]);
            }
        }

        $data = $query->latest();

        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                $deleteBtn = '<button type="button" class="btn btn-sm btn-danger delete-enquiry" data-id="' . $row->id . '">
                    <i class="ri-delete-bin-line"></i>
                </button>';
                return $deleteBtn;
            })
            ->editColumn('created_at', fn($row) => $row->created_at->format('d M Y H:i'))
            ->rawColumns(['action'])
            ->make(true);
    }

    // Fetch unique subjects for the filter dropdown
    $subjects = Enquiry::select('subject')->distinct()->pluck('subject')->toArray();

    return view('backend.enquiries.index', compact('subjects'));
}

    public function destroy(Enquiry $enquiry)
    {
        try {
            $enquiry->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Unable to delete.'], 500);
        }
    }
}
