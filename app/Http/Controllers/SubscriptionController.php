
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function subscribe($themeId)
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Check if the user is already subscribed
        $isSubscribed = DB::table('subscriptions')
            ->where('user_id', $userId)
            ->where('theme_id', $themeId)
            ->exists();

        if (!$isSubscribed) {
            // Add the subscription
            DB::table('subscriptions')->insert([
                'user_id' => $userId,
                'theme_id' => $themeId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['status' => 'subscribed']);
        }

        return response()->json(['status' => 'already_subscribed']);
    }

    public function unsubscribe($themeId)
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Check if the user is subscribed
        $isSubscribed = DB::table('subscriptions')
            ->where('user_id', $userId)
            ->where('theme_id', $themeId)
            ->exists();

        if ($isSubscribed) {
            // Remove the subscription
            DB::table('subscriptions')
                ->where('user_id', $userId)
                ->where('theme_id', $themeId)
                ->delete();

            return response()->json(['status' => 'unsubscribed']);
        }

        return response()->json(['status' => 'not_subscribed']);
    }
}