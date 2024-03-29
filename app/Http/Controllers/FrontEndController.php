<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontEndController extends Controller
{
    public function home(Request $request)
    {
        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();

        $firstPosts2 = $posts->splice(0, 2);
        $middlePost = $posts->splice(0, 1);
        $lastPosts = $posts->splice(0);

        $footerPosts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();
        $firstFooterPost = $footerPosts->splice(0, 1);
        $firstfooterPosts2 = $footerPosts->splice(0, 2);
        $lastFooterPost = $footerPosts->splice(0, 1);

        $search = $request->search ?? "";

        $recentPosts = Post::with('category', 'user');

        
        // dd($search);
        if ($search != "") {
            $recentPosts = $recentPosts->where('title', 'LIKE', '%'.$search.'%')->orderBy('created_at', 'DESC')->paginate(5);
        } else {
            $recentPosts = $recentPosts->orderBy('created_at', 'DESC')->paginate(5);
        }
        
        return view('website.home', compact(['posts', 'recentPosts', 'firstPosts2', 'middlePost', 'lastPosts', 'firstFooterPost', 'firstfooterPosts2', 'lastFooterPost', 'search']));
    }
    
    public function about(){
        $user = User::first();

        return view('website.about', compact('user'));
    }
    
    public function category($slug){
        $category = Category::where('slug', $slug)->first();
        if($category){
            $posts = Post::where('category_id', $category->id)->paginate(9);

            return view('website.category', compact(['category', 'posts']));
        }else {
            return redirect()->route('website');
        }
    }
    
    public function tag($slug){
        $tag = Tag::where('slug', $slug)->first();
        if($tag){
            $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(9);

            return view('website.tag', compact(['tag', 'posts']));
        }else {
            return redirect()->route('website');
        }
    }
    
    public function contact(){
        return view('website.contact');
    }
    
    public function post($slug, Category $id)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();

        // More related posts
        $relatedPosts = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();
        $firstRelatedPost = $relatedPosts->splice(0, 1);
        $firstRelatedPosts2 = $relatedPosts->splice(0, 2);
        $lastRelatedPost = $relatedPosts->splice(0, 1);

        // $categories = Category::all();
        $categories = Category::with('post')->get();
        // $categoriesCount = Post::where('category_id', '=', $id)->count();
        $tags = Tag::all();

        if($post){
            return view('website.post', compact(['post', 'posts', 'relatedPosts', 'firstRelatedPost', 'firstRelatedPosts2', 'lastRelatedPost', 'categories', 'tags']));
        }else {
            return redirect('/');
        }
    }

    public function comment(Request $request)
    {
        $comment = new Comment();
        
        // $comment = Comment::create([
        //     'comment' => $request->comment,
        //   ]);
        $comment->comment = $request->comment;


        $comment->user()->associate($request->user());

        $post = Post::findOrFail($request->post_id);
        
        // $post->user()->comments()->save($comment);
        $post->comments()->save($comment);
        

        return back()->withSuccess("Your comment added successfully, thanks");
    }
    
    public function replyComment(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $post = Post::find($request->get('post_id'));

        $post->comments()->save($reply);

        return back()->withSuccess("Your replied added successfully, thanks");
    }
    
    public function send_message(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'subject' => 'required|max:255',
            'message' => 'required|min:100',
        ]);

        $contact = Contact::create($request->all());

        Session::flash('message-send', 'Contact message send successfully');
        return redirect()->back();
    }
}
