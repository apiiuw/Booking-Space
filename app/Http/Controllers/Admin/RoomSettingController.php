<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Room;
use App\Models\RoomType;

class RoomSettingController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('admin.pages.room-setting.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('admin.pages.room-setting.create-type');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Nama file unik
            $fileName = Str::slug($request->type) . '-' . time() . '.' . $image->getClientOriginalExtension();

            // Simpan ke public/img/room-types
            $image->move(public_path('img/room-types'), $fileName);

            // Path yang disimpan ke database
            $imagePath = 'img/room-types/' . $fileName;
        }

        RoomType::create([
            'type'  => $request->type,
            'url'   => Str::slug($request->type),
            'image' => $imagePath,
        ]);

        return redirect()
            ->route('room.setting.index')
            ->with('success', 'Tipe ruangan berhasil ditambahkan');
    }

    public function showRoomNumber($url)
    {
        $rooms = Room::where('url', $url)
            ->where('is_active', true)
            ->get();

        if ($rooms->isEmpty()) {
            abort(404);
        }

        $roomType = $rooms->first(); // untuk judul tipe

        return view(
            'admin.pages.room-setting.room-number',
            compact('rooms', 'roomType')
        );
    }

    public function showRoom($url, $roomId)
    {
        $room = Room::where('url', $url)
            ->where('id', $roomId)
            ->firstOrFail();

        return view('admin.pages.room-setting.room', compact('room'));
    }

    public function editRoom($url, $roomId)
    {
        $room = Room::where('url', $url)
            ->where('id', $roomId)
            ->firstOrFail();

        // Default nilai
        $dayStart = null;
        $dayEnd = null;

        // Parsing "Senin s/d Sabtu"
        if (!empty($room->borrow_days)) {
            $days = explode(' s/d ', $room->borrow_days);

            $dayStart = $days[0] ?? null;
            $dayEnd   = $days[1] ?? null;
        }

        return view(
            'admin.pages.room-setting.edit',
            compact('room', 'dayStart', 'dayEnd')
        );
    }

    public function updateRoom(Request $request, $url, $roomId)
    {
        $room = Room::where('url', $url)
            ->where('id', $roomId)
            ->firstOrFail();

        // Validasi
        $request->validate([
            'capacity' => 'required|integer|min:1',
            'facilities' => 'nullable|string',
            'day_start' => 'required|string',
            'day_end' => 'required|string',
            'borrow_time_start' => 'required',
            'borrow_time_end' => 'required',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'required|boolean',
        ]);

        // Gabungkan hari operasional
        $borrowDays = $request->day_start . ' s/d ' . $request->day_end;

        // Update data utama
        $room->capacity = $request->capacity;
        $room->facilities = $request->facilities;
        $room->borrow_days = $borrowDays;
        $room->borrow_time_start = $request->borrow_time_start;
        $room->borrow_time_end = $request->borrow_time_end;
        $room->description = $request->description;
        $room->is_active = $request->is_active;

        // Upload gambar (jika ada)
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('rooms', 'public');

            $room->image = 'storage/' . $path;
        }

        $room->save();

        return redirect()
            ->route('room.setting.room', [$room->url, $room->id])
            ->with('success', 'Data ruangan berhasil diperbarui.');
    }


}