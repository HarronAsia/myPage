<?php

namespace App\Repositories\Admin;

use App\Repositories\BaseRepository;

use App\Models\User;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreAdmin;
use Illuminate\Support\Facades\Session;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\AdminPanel::class;
    }

    //*===============Count=============================*//
    public function countAllAccounts()
    {
        return $this->model->users = DB::table('users')->count();
    }

    public function countAllUsers()
    {
        return $this->model->users = DB::table('users')->where('role','"member"')->count();
    }

    public function countAllManagers()
    {
        return $this->model->managers = DB::table('users')->where('role','"manager"')->count();
    }

    public function countAllAdmins()
    {
        return $this->model->admins = DB::table('users')->where('role','"admin"')->count();
    }

    public function countAllThreadsByManager()
    {
        return $this->model->managers_threads = DB::table('threads')->join('users', 'user_id', '=', 'users.id')->get()->where('role', '"manager"')->count();
    }
    
    public function countAllThreadsByAdmin()
    {
        return $this->model->admins_threads = DB::table('threads')->join('users', 'user_id', '=', 'users.id')->get()->where('role', '"admin"')->count();
    }

    public function countAllTags()
    {
        return $this->model->tags = DB::table('tags')->get()->count();
    }

    public function countAllForums()
    {
        return $this->model->forums = DB::table('forums')->get()->count();
    }

    public function countAllCategories()
    {
        return $this->model->categories = DB::table('categories')->get()->count();
    }

    public function countAllCommunities()
    {
        return $this->model->communities = DB::table('communities')->get()->count();
    }

    public function countAllPosts()
    {
        return $this->model->posts = DB::table('posts')->get()->count();
    }

    public function countAllComments()
    {
        return $this->model->comments = DB::table('comments')->get()->count();
    }

    public function countAllReports()
    {
        return $this->model->comments = DB::table('reports')->get()->count();
    }

    public function countAllNotifications()
    {
        return $this->model->comments = DB::table('notifications')->get()->count();
    }

    //*===============Count =============================*//


    //*===============For User=============================*//
    public function getAllUsers()
    {
        return $this->model = DB::table('users')->where('role', '=', '"member"')->paginate(10);
    }

    //*===============For User=============================*//


    //*===============For Manager=============================*//
    public function getAllManagers()
    {
        return $users = DB::table('users')->where('role', '=', '"manager"')->paginate(10);
    }

    //*===============For Manager=============================*//


    //*===============For ADmin=============================*//
    public function getAllAdmins()
    {
        return $users = DB::table('users')->where('role', '=', '"admin"')->paginate(10);
    }

    //*===============For Admin=============================*//


    //*===============Main Edit=============================*//

    public function findAccount($id)
    {
        //dd($this->model = User::findOrFail($id));
        return $this->model = User::findOrFail($id);
        
    }
    //*===============Main Edit=============================*//
}
