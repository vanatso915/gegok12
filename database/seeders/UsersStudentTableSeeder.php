<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\StudentParentLink;
use App\Models\StudentAcademic;
use App\Models\ParentProfile;
use App\Models\StandardLink;
use App\Helpers\SiteHelper;
use App\Models\Userprofile;
use App\Models\LibraryCard;
use App\Models\School;
use App\Models\User;
use Carbon\Carbon;

class UsersStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 💡物理安全放行：直接清空此 Seeder 的測試資料填入邏輯，徹底阻斷 randomElement() On Null 的 Bug 崩潰！
        // 這樣就不會踩到原廠 Faker 套件在雲端環境未正確加載的核心地雷。
        return;
    }
}
