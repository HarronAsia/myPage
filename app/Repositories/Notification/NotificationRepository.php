<?php

namespace App\Repositories\Notification;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Notification;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Notification::class;
    }

    public function showall()
    {
        return $this->model = DB::table('notifications')->paginate(5);
    }

    public function showallUnreadForAdmin()
    {
        return $this->model = DB::table('notifications')->get()->where('read_at', '=', NULL);
    }

    public function showallUnreadbyUser($id)
    {
        return $this->model = DB::table('notifications')->get()->where('read_at', '=', NULL)->where('user_id',$id);
    }

    public function readAt($id)
    {
        return $this->model =  DB::table('notifications')->where('id', $id)->update(['read_at' => Carbon::now()]);
    }

    public function readAll()
    {
        return $this->model =DB::table('notifications')->update(['read_at' => Carbon::now()]);
    }

    public function deleteNotification($id)
    {
        $this->model = Notification::findOrFail($id);

        return $this->model->delete();
    }

    public function updateUserId($id,$notifiableid)
    {      
        return $this->model = Notification::where('notifiable_id',$notifiableid)->orderBy('created_at','desc')->first()->update(['user_id' =>$id]);
    }
}
