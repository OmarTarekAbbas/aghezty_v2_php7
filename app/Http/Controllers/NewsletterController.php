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
        $exists = $this->newsletterRepository->where('mail', $request->mail)->count();
        if($exists){
          session()->flash('fail', 'Already subscribed!');
          return 'fail';
        }else{
          $newsletter['mail'] = $request->mail;
          $this->newsletterRepository->create($newsletter);
          session()->flash('success', 'Thank you for subscribe!');
          return 'success';
        }
    }

    /**
     * Method delete
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $news = $this->newsletterRepository->find($id);
      $news->delete();
      return back()->with("success", "delete successfully");
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
        return redirect('newsletter/send')->with('success', 'Sent!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function testmail()
    {
        $content = 'test';
        return view('mails.newsletter', compact('content'));
    }
}
