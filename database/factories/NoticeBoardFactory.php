<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BackgroundImage;
use App\Models\NoticeBoard;

class NoticeBoardFactory extends Factory
{
    protected $model = NoticeBoard::class;

    public function definition()
    {
        $titles = [
            'School Annual Sports Meet 2026',
            'Mid-Term Examination Schedule',
            'Parent-Teacher Meeting Notice',
            'Library Book Return Reminder',
            'National Holiday Announcement',
            'Science Fair Registration Open'
        ];

        $paragraphs = [
            'Please note that all students and staff are required to adhere strictly to the schedule and guidelines provided in this notice.',
            'Important updates regarding the upcoming academic calendar have been published. Please review the details carefully.',
            'Co-curricular activities will resume as normal starting next week. Kindly coordinate with your respective class teachers for more information.',
            'All school fee payments must be cleared before the end of the current month to avoid late penalties.'
        ];

        return [
            'background_id'     => BackgroundImage::inRandomOrder()->value('id'),
            'title'             => $titles[array_rand($titles)] . ' ' . rand(1, 100),
            'publish_date'      => date('Y-m-d H:i:s', rand(strtotime('-10 days'), time())),
            'expire_date'       => date('Y-m-d H:i:s', rand(time(), strtotime('+10 days'))),
            'description'       => $paragraphs[array_rand($paragraphs)],
            'attachment_file'   => null,
        ];
    }
}
