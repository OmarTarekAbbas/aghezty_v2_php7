<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Repositories\NewsletterRepository;
use App\Http\Requests\newsletter\NewsletterSendRequest;
use App\Http\Requests\newsletter\NewsletterStoreRequest;
use App\Http\Services\Newsletter\NewsletterStoreService;

class NewsletterController extends Controller
{
    /**
     * newsletterRepository.
     *
     */
    private $newsletterRepository;
    private $newsletterStoreService;

    /**
     * construct.
     *
     */
    public function __construct(NewsletterRepository $newsletterRepository,NewsletterStoreService $newsletterStoreService)
    {
        $this->newsletterRepository = $newsletterRepository;
        $this->newsletterStoreService = $newsletterStoreService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = $this->newsletterRepository->all();
        return view('newsletter.index', compact('newsletters'));
    }

    /**
     * Show the form for sending a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
        return view('newsletter.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsletterStoreRequest $request)
    {
        $newsletter['mail'] = $request->mail;
        $this->newsletterRepository->firstOrCreate($newsletter);
        return redirect()->back()->with('success', 'Thank you for subscribe');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(NewsletterSendRequest $request)
    {
        $this->newsletterStoreService->handle($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}
