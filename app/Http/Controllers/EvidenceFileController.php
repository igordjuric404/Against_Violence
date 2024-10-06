<?php

namespace App\Http\Controllers;

use App\Models\EvidenceFile;
use Defuse\Crypto\Crypto;
use Defuse\Crypto\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EvidenceFileController extends Controller
{
    public function index()
    {
        $user=auth()->user();
        if ($user->encryption_key==null) {
            return redirect(route('user.showEncryptionKeyForm'));
        }
        $files = EvidenceFile::where('user_id', $user->id)->get();
        return view('evidence-file.index',[
            'files'=>$files,
            'title'=>'Dodaj dokaze'
        ]);
    }

    public function upload(Request $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->encryption_key, $user->encryption_key)) {
            return redirect()->back()->withErrors(['encryption_key' => 'Invalid encryption key.']);
        }

        foreach ($request->file('file') as $file) {
            $path = $file->store('evidence_files');

            $content = file_get_contents($file);
            Storage::put($path, $content);

            $evidenceFile = new EvidenceFile();
            $evidenceFile->user_id = auth()->id();
            $evidenceFile->filename = $file->getClientOriginalName();
            $evidenceFile->path = $path;
            $evidenceFile->save();
        }

        return redirect()->route('evidence-file.index')->with('success', 'Files uploaded successfully');
    }

    public function download($id, Request $request)
    {
        $file = EvidenceFile::findOrFail($id);

        if ($file->user_id !== auth()->id()) {
            abort(403);
        }

        $user = auth()->user();

        if (!Hash::check($request->encryption_key, $user->encryption_key)) {
            abort(404);
        }

        $content = Storage::get($file->path);

        return response($content)
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-Disposition', 'attachment; filename="' . $file->filename . '"');
    }


}
