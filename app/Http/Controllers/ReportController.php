<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Repositories\Thread\ThreadRepositoryInterface;
use App\Repositories\User\Account\ProfileRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Repositories\Report\ReportRepositoryInterface;

class ReportController extends Controller
{

    protected $threadRepo;
    protected $profileRepo;
    protected $notiRepo;
    protected $repoRepo;

    public function __construct(
        ThreadRepositoryInterface $threadRepo,
        ProfileRepositoryInterface $profileRepo,
        NotificationRepositoryInterface $notiRepo,
        ReportRepositoryInterface $repoRepo
    ) {
        $this->threadRepo = $threadRepo;
        $this->profileRepo = $profileRepo;
        $this->notiRepo = $notiRepo;
        $this->repoRepo = $repoRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (Auth::guest()) {
            $thread = $this->threadRepo->showThread($id);
            return view('confirms.Report.add_Report', compact('thread'));
        } else {
            $thread = $this->threadRepo->showThread($id);
            if(Auth::user()->role == 'admin')
            {
                $notifications = $this->notiRepo->showallUnreadForAdmin();
            }
            else
            {
                $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            }
            $profile = $this->profileRepo->getProfile(Auth::user()->id);
            return view('confirms.Report.add_Report', compact('notifications', 'thread', 'profile'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReport $request, $id)
    {

        $data = $request->validated();
        // dd( $data);
        $thread = $this->threadRepo->showThread($id);
        if(Auth::guest())
        {
            $data['user_id'] = NULL;
        }
        else
        {
            $data['user_id'] = Auth::user()->id;
        }
        //dd($data);
        $thread->reports()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'reason' => $data['reason'],
            'detail' =>  $data['detail'],
            'user_id' => $data['user_id']

        ]);
        return redirect()->route('thread.detail', [$thread->forum_id, $thread->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repoRepo->deleteReport($id);


        return redirect()->back();
    }

    public function restore($id)
    {
        $this->repoRepo->restoreReport($id);

        return redirect()->back();
    }
}
