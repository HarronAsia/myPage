<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Repositories\Thread\ThreadRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\User\Account\ProfileRepositoryInterface;
use App\Repositories\Notification\NotificationRepositoryInterface;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    protected $cateRepo;
    protected $threadRepo;
    protected $profileRepo;
    protected $notiRepo;

    public function __construct(CategoryRepositoryInterface $cateRepo, ThreadRepositoryInterface $threadRepo, ProfileRepositoryInterface $profileRepo, NotificationRepositoryInterface $notiRepo)
    {

        $this->cateRepo = $cateRepo;
        $this->threadRepo = $threadRepo;
        $this->profileRepo = $profileRepo;
        $this->notiRepo = $notiRepo;
    }

    public function admin(Request $req)
    {
        return view('unauthorized')->withMessage("Admin");
    }
    public function manager(Request $req)
    {
        return view('unauthorized')->withMessage("Manager");
    }
    public function member(Request $req)
    {
        return view('unauthorized')->withMessage("Member");
    }

    public function index()
    {

        if (Auth::guest() == True) {
            $categories = $this->cateRepo->showall();
            return view('home', compact('categories'));
        } else {
            $categories = $this->cateRepo->showall();
            $profile = $this->profileRepo->getProfile(Auth::user()->id);

            if (Auth::user()->role == 'admin') {
                $notifications = $this->notiRepo->showallUnreadForAdmin();
            } else {
                $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
            }


            return view('home', compact('categories', 'notifications', 'profile'));
        }
    }

    public function readAt($id)
    {
        $this->notiRepo->readAt($id);

        return redirect()->back();
    }

    public function readAll()
    {

        $this->notiRepo->readAll();
        return redirect()->back();
    }

    public function showAllNotifications()
    {
        if (Auth::user()->role == 'admin') {
            $allnotifications = $this->notiRepo->showallUnreadForAdmin();
        } else {
            $allnotifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        }

        $profile = $this->profileRepo->getProfile(Auth::user()->id);
        if (Auth::user()->role == 'admin') {
            $notifications = $this->notiRepo->showallUnreadForAdmin();
        } else {
            $notifications = $this->notiRepo->showallUnreadbyUser(Auth::user()->id);
        }
        return view('Notifications.lists', compact('notifications', 'profile', 'allnotifications'));
    }

    public function destroy($id)
    {
        $this->notiRepo->deleteNotification($id);

        return redirect()->back();
    }

    public function test()
    {
        return view('modified');
    }
}
