<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExtractTelegramChannelHashtags extends Command
{
    /**
     * نام و توضیحات دستور
     */
    protected $signature = 'telegram:extract-hashtags-channel';
    protected $description = 'Extract telegram Channel hashtags from messages and save them to the hashtags field';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $batchSize = 10000; // اندازه دسته
        $offset = 0;

        while (true) {
            // پیام‌ها را در دسته‌های بزرگ بازیابی کنید
            $messages = DB::select("
                SELECT id, message
                FROM telegram_channel_messages
                WHERE id > ?
                ORDER BY id ASC
                LIMIT ?
            ", [$offset, $batchSize]);

            if (empty($messages)) {
                break; // وقتی همه پیام‌ها پردازش شد، حلقه پایان یابد
            }

            $updates = [];
            foreach ($messages as $message) {
                $hashtags = $this->extractHashtags($message->message);
                $updates[] = [
                    'id' => $message->id,
                    'hashtags' => json_encode($hashtags),
                ];
                $offset = $message->id; // به‌روزرسانی آخرین ID پردازش شده
            }

            // آپدیت داده‌ها با کوئری گروهی
            DB::transaction(function () use ($updates) {
                foreach ($updates as $update) {
                    DB::update("
                        UPDATE telegram_channel_messages
                        SET hashtags = ?
                        WHERE id = ?
                    ", [$update['hashtags'], $update['id']]);
                }
            });

            echo "Processed up to ID: $offset\n";
        }

        echo "All messages processed successfully.\n";
    }

    private function extractHashtags($message)
    {
        // حذف علائم نگارشی از متن پیام
        $cleanedText = preg_replace('/[.,;:!?()\[\]{}<>"\']/', '', $message);
        $cleanedText = strtolower($cleanedText);
        // یافتن تمام هشتگ‌ها از متن پیام
        preg_match_all('/#(\w+)/u', $cleanedText, $matches);
        $hashtags = $matches[1];

        return $hashtags;
    }
}
