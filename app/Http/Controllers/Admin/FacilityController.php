<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Facility;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
class FacilityController extends Controller
{
    public function __construct()
    {
        // Hanya user dengan permission "view-facilities" yang bisa akses index
        $this->middleware('permission:view-facility')->only(['index']);

        // Hanya user dengan permission "create-facilities" yang bisa tambah fasilitas
        $this->middleware('permission:create-facility')->only(['create', 'store']);

        // Hanya user dengan permission "edit-facilities" yang bisa edit fasilitas
        $this->middleware('permission:edit-facility')->only(['edit', 'update']);

        // Hanya user dengan permission "delete-facilities" yang bisa hapus fasilitas
        $this->middleware('permission:delete-facility')->only(['destroy']);
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        $query = Facility::query();

        if ($search) {
            $query->where('name', 'like', "%$search%");
        }

        $facilities = $query->orderBy('name')->paginate($perPage)->withQueryString();

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('facilities', 'name')->whereNull('deleted_at'),
            ],
            'icon'=> [ 'required'],
        ]);

        Facility::create($request->all());

        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function edit(Facility $facility)
    {
        return view('admin.facilities.edit', compact('facility'));
    }
    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('facilities', 'name')->ignore($facility->id)->whereNull('deleted_at'),
            ],
            'icon'=> [ 'required'],
        ]);
        $facility->update($request->all());
        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil diperbarui.');
    }
    public function destroy(Facility $facility)
    {
        $facility->delete();
        return redirect()->route('admin.facilities.index')->with('success', 'Fasilitas berhasil dihapus.');
    }
}
