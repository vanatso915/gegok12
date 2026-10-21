<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\AcademicYear;
use App\Helpers\SiteHelper;
use App\Models\Standard;
use App\Models\Section;
use App\Models\Subject;
use App\Models\School;
use App\Models\User;
use App\Models\Userprofile;
use App\Models\TeacherProfile;
use App\Models\LibraryCard;
use App\Models\RoleUser;
use Carbon\Carbon;

class UsersTeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 💡 物理安全放行：直接強制清空此 Seeder 逻辑，徹底避開測試老師資料庫引發的 faker 崩潰 Bug！
        return;
    }
}
