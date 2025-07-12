<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use App\Models\Comment;

class FeedbackController extends Controller
{
    public function analyzeAllComments()
{
    $comments = Comment::all();

    $positiveCount = 0;
    $negativeCount = 0;
    $neutralCount = 0;

    foreach ($comments as $comment) {
        $sentimentLabel = $this->getSentimentAnalysis($comment->text);

        switch ($sentimentLabel) {
            case 'positive':
                $positiveCount++;
                break;
            case 'negative':
                $negativeCount++;
                break;
            case 'neutral':
                $neutralCount++;
                break;
        }
    }

    $totalComments = $comments->count();

    if ($totalComments === 0) {
        $predominantSentiment = 'No comments found.';
    } else {
        if ($positiveCount > $negativeCount && $positiveCount > $neutralCount) {
            $predominantSentiment = 'positive';
        } elseif ($negativeCount > $positiveCount && $negativeCount > $neutralCount) {
            $predominantSentiment = 'negative';
        } elseif ($neutralCount > $positiveCount && $neutralCount > $negativeCount) {
            $predominantSentiment = 'neutral';
        } else {
            $predominantSentiment = 'mixed';
        }
    }

    return view('admin.feedback', compact('positiveCount', 'negativeCount', 'neutralCount', 'predominantSentiment'));}


    public function getSentimentAnalysis($text)
    {
        $positiveWords = ['good', 'great', 'excellent', 'amazing', 'positive'];
        $negativeWords = ['bad', 'poor', 'terrible', 'negative', 'awful'];

        $text = strtolower($text);

        $positiveCount = 0;
        $negativeCount = 0;

        foreach ($positiveWords as $word) {
            if (strpos($text, $word) !== false) {
                $positiveCount++;
            }
        }

        foreach ($negativeWords as $word) {
            if (strpos($text, $word) !== false) {
                $negativeCount++;
            }
        }

        if ($positiveCount > $negativeCount) {
            return 'positive';
        } elseif ($negativeCount > $positiveCount) {
            return 'negative';
        } else {
            return 'neutral';
        }
    }
}
