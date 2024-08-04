<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        // Xử lý upload ảnh
        $path = $request->file('image_path')->store('banners', 'public');

        Banner::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $path,
            'link' => $request->link,
            'active' => $request->has('active'),
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,|max:2048',
            'link' => 'nullable|url',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image_path')) {
            // Xóa ảnh cũ
            if ($banner->image_path) {
                Storage::disk('public')->delete($banner->image_path);
            }

            // Lưu ảnh mới
            $path = $request->file('image_path')->store('banners', 'public');
            $banner->image_path = $path;
        }

        $banner->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'active' => $request->has('active'),
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully.');
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    public function destroy(Banner $banner)
    {
        // Xóa ảnh trước khi xóa banner
        if ($banner->image_path) {
            Storage::disk('public')->delete($banner->image_path);
        }

        $banner->delete();
        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully.');
    }
}
