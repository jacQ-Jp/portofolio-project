<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of all projects.
     */
    public function index()
    {
        $projects = Project::with('user')->latest()->paginate(12);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();

        $mediaPath = null;
        $mediaType = null;

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();

            // Tentukan tipe media
            if (in_array($extension, ['jpeg', 'png', 'jpg', 'gif'])) {
                $mediaType = 'image';
                $mediaPath = $file->store('projects/images', 'public');
            } else {
                $mediaType = 'video';
                $mediaPath = $file->store('projects/videos', 'public');
            }
        }

        Project::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'media_path' => $mediaPath,
            'media_type' => $mediaType,
            'figma_link' => $validated['figma_link'] ?? null,
            'github_link' => $validated['github_link'] ?? null,
            'live_link' => $validated['live_link'] ?? null,
            'tiktok_link' => $validated['tiktok_link'] ?? null,
            'tags' => $validated['tags'] ?? null,
        ]);

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        abort_unless($project->user_id === Auth::id(), 403);

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        abort_unless($project->user_id === Auth::id(), 403);

        $validated = $request->validated();

        if ($request->hasFile('media')) {
            // Hapus file lama jika ada
            if ($project->media_path) {
                Storage::disk('public')->delete($project->media_path);
            }

            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();

            if (in_array($extension, ['jpeg', 'png', 'jpg', 'gif'])) {
                $project->media_type = 'image';
                $project->media_path = $file->store('projects/images', 'public');
            } else {
                $project->media_type = 'video';
                $project->media_path = $file->store('projects/videos', 'public');
            }
        }

        $project->update([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'media_path' => $project->media_path,
            'media_type' => $project->media_type,
            'figma_link' => $validated['figma_link'] ?? null,
            'github_link' => $validated['github_link'] ?? null,
            'live_link' => $validated['live_link'] ?? null,
            'tiktok_link' => $validated['tiktok_link'] ?? null,
            'tags' => $validated['tags'] ?? null,
        ]);

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil diperbarui!');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        abort_unless($project->user_id === Auth::id(), 403);

        // Hapus file media jika ada
        if ($project->media_path) {
            Storage::disk('public')->delete($project->media_path);
        }

        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project berhasil dihapus!');
    }
}
