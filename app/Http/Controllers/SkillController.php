<?php

/**
 * NOTE:
 * Fitur Skills saat ini tidak dipakai oleh UI portfolio utama (halaman `projects.index`).
 * Route skills juga sudah dihapus dari `routes/web.php`.
 * File ini bisa dihapus jika kamu ingin benar-benar bersih.
 */

namespace App\Http\Controllers;

use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::query()
            ->where('user_id', auth()->id())
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request)
    {
        Skill::create([
            'user_id' => $request->user()->id,
            'name' => $request->validated('name'),
            'level' => $request->validated('level'),
            'category' => $request->validated('category'),
            'sort_order' => (int) ($request->validated('sort_order') ?? 0),
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        abort_unless($skill->user_id === auth()->id(), 403);

        return view('skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        abort_unless($skill->user_id === auth()->id(), 403);

        $skill->update([
            'name' => $request->validated('name'),
            'level' => $request->validated('level'),
            'category' => $request->validated('category'),
            'sort_order' => (int) ($request->validated('sort_order') ?? 0),
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        abort_unless($skill->user_id === auth()->id(), 403);

        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill berhasil dihapus.');
    }
}
