<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PortfolioController extends Controller
{
    public function index()
    {
        $configData = config('portfolio');
        $featuredProjects = Project::where('is_featured', true)->take(3)->get();

        return view('pages.portfolio', [
            'p' => $configData,
            'databaseProjects' => $featuredProjects
        ]);
    }

    public function projects()
    {
        $configData = config('portfolio');
        $allProjects = Project::all();

        return view('pages.projects-all', [
            'p' => $configData,
            'projects' => $allProjects
        ]);
    }

    public function contact(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:3000'],
        ]);

        ContactMessage::create($data);

        try {
            Mail::raw(
                "You received a new portfolio message!\n\n" .
                    "From: {$data['name']} ({$data['email']})\n" .
                    "Subject: " . ($data['subject'] ?: 'New message') . "\n\n" .
                    "Message:\n{$data['message']}",
                function ($m) use ($data) {
                    $m->to(config('portfolio.email'))
                        ->replyTo($data['email'], $data['name'])
                        ->subject('Portfolio Lead: ' . ($data['subject'] ?: 'New message from ' . $data['name']));
                }
            );
        } catch (\Throwable $e) {
            Log::error('Portfolio email dispatch failed: ' . $e->getMessage());
        }

        return redirect()->to(route('home') . '#contact')
            ->with('success', "Thanks {$data['name']}! I've received your message and will get back to you soon.");
    }
}
