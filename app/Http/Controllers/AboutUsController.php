<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    // Method to display the About Us page
    public function index()
    {
        // You can pass any data to the view if needed
        $pageData = [
            'title' => 'About Us',
            'mission' => 'At Tech Horizons, we are dedicated to exploring the most significant technological innovations while highlighting their ethical and societal challenges. Our mission is to provide insightful, accurate, and engaging content that empowers our readers to understand and shape the future of technology.',
            'team' => 'We are a passionate team of professionals, researchers, and enthusiasts who are deeply committed to sharing knowledge about emerging technologies. From artificial intelligence to cybersecurity, our experts bring diverse perspectives to help you stay informed and inspired.',
            'whyChooseUs' => [
                'In-Depth Analysis: We go beyond the surface to provide comprehensive insights into the latest tech trends.',
                'Expert Contributors: Our team includes industry leaders and academic experts.',
                'Community Engagement: We foster a vibrant community of tech enthusiasts through discussions, forums, and events.',
            ],
        ];

        // Pass the data to the view
        return view('about-us', compact('pageData'));
    }
}