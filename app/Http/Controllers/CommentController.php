<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Comment;
    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\RequestException;
    use Illuminate\Support\Facades\Log;

    class CommentController extends Controller
    {
        /**
         * Store a new comment.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

            $request->validate([
                'text' => 'required|string|max:500',
            ]);

            Comment::create([
                'text' => $request->text,
                'created_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Comment added successfully!');
        }

        public function index()
        {

                $recentComments = Comment::latest()->take(1)->get(['text', 'created_at']);

                return response()->json($recentComments);


        }
    }
