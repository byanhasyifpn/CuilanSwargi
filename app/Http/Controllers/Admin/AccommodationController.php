<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\AccommodationService;
use Illuminate\Support\Facades\DB;



class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::withCount('images')->latest()->paginate(10);
        return view('admin.accommodation.index', compact('accommodations'));
    }

    public function create()
    {
        return view('admin.accommodation.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'capacity' => 'required|integer|min:1',
        'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        'services' => 'required|array|min:1',
        'services.*.name' => 'required|string|max:255',
        'services.*.price' => 'required|integer|min:0',
        'services.*.facilities' => 'required|string',
    ]);

    DB::transaction(function () use ($request) {

        $accommodation = Accommodation::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('accommodations', 'public');

                AccommodationImage::create([
                    'accommodation_id' => $accommodation->id,
                    'image' => $imagePath,
                ]);
            }
        }

        foreach ($request->services as $service) {
            AccommodationService::create([
                'accommodation_id' => $accommodation->id,
                'name' => $service['name'],
                'price' => $service['price'],
                'facilities' => $service['facilities'],
            ]);
        }
    });

    return redirect()->route('admin.accommodation.index')
        ->with('success', 'Penginapan berhasil ditambahkan!');
}





    public function edit(Accommodation $accommodation)
    {
        $accommodation->load('images');
        return view('admin.accommodation.edit', compact('accommodation'));
    }

    public function update(Request $request, Accommodation $accommodation)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'capacity' => 'required|integer|min:1',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

        'services.*.name' => 'required|string|max:255',
        'services.*.price' => 'required|integer|min:0',
        'services.*.facilities' => 'required|string',
    ]);

    \DB::transaction(function () use ($request, $accommodation) {

        $accommodation->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);

        // Hapus semua service lama
        $accommodation->services()->delete();

        // Simpan ulang service
        foreach ($request->services as $service) {
            $accommodation->services()->create([
                'name' => $service['name'],
                'price' => $service['price'],
                'facilities' => $service['facilities'],
            ]);
        }

        // Upload gambar baru jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('accommodations', 'public');

                $accommodation->images()->create([
                    'image' => $imagePath,
                ]);
            }
        }
    });

    return redirect()->route('admin.accommodation.index')
        ->with('success', 'Penginapan berhasil diperbarui!');
}




    public function destroy(Accommodation $accommodation)
    {
        foreach ($accommodation->images as $image) {
            Storage::disk('public')->delete($image->image);
        }

        $accommodation->delete();

        return redirect()->route('admin.accommodation.index')
            ->with('success', 'Penginapan berhasil dihapus!');
    }

    

    public function deleteImage($id)
    {
        $image = AccommodationImage::findOrFail($id);

        if (Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus!');
    }
    


}