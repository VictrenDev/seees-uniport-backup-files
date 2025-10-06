<?php

namespace App\Http\Controllers;


use App\Models\Image;
use App\Models\Article;
use App\Models\Image_ref;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

// Calculate the read minutes


class ArticleController extends Controller
{
    public function upload(Request $request)
    {   
        $request->validate([  
            'file'=> ['required','image','mimes:jpeg,png,jpg,gif,svg,webp','max:5120']
        ]);       
        $image = $request->file('file');
        // Generate a unique filename
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        // Store the image in the temp folder
        Storage::disk('local')->put('temp_images/' . $filename, file_get_contents($image));
        
        // Clean up files older than a certain period (e.g., 24 hours)
        // Storage::disk('local')->delete(Storage::files('temp_images'));
        
        //Generate image URL
        $imageUrl = url('temp_images', $filename);
        return $imageUrl;
    }

    public function write(Request $request)
    {
        $lastInsertedId = null;
        $lastImageId = null;

        // Validate input
        $formFields = $request->validate([  
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'image_list' => ['required', 'string'],
            'desc' => ['required','string'],
            'body' => ['required','string'],
            'author' => ['required','string', 'min:3', 'max:250'],
            'status' => ['required'],
            'date' => ['required'],
            'tag' => ['required','string'],
        ]);

        //Change all image links directory from temp to upload
        $pattern2 = '/temp_images/';
        $formFields['body'] = preg_replace($pattern2,'uploads', $formFields['body']);


        // Sanitize Input
        $formFields['title'] = htmlspecialchars($formFields['title'], ENT_QUOTES,'UTF-8');
        $formFields['desc'] = htmlspecialchars($formFields['desc'], ENT_QUOTES,'UTF-8');
        $formFields['author'] = htmlspecialchars($formFields['author'], ENT_QUOTES,'UTF-8');
        $formFields['tag'] = htmlspecialchars($formFields['tag'], ENT_QUOTES,'UTF-8');
        
        
        // Store Article
        $lastInsertedId = Article::create([
             'title' => $formFields['title'],
             'desc' => $formFields['desc'],
             'body' => $formFields['body'],
             'author' => $formFields['author'],
             'status' => $formFields['status'],
             // Return read minutes
             'read_min' => max(1, ceil(str_word_count(strip_tags($formFields['body'])) / 200)),
             'starting_at' => $formFields['date'],
             'tag' => $formFields['tag'],
        ])->article_id;

        $pattern1 = '/.+\/temp_images\//';
        $imageList = preg_replace($pattern1, '', json_decode($formFields['image_list'], true));
        //Move list of images from temporal to final destination
        
        foreach ($imageList as $value) {
            $fileName =  $value;
            $tempImagePath = storage_path('app/temp_images/') . $fileName;
            $finalImagePath = public_path().'/../../public_html/uploads/' . $fileName;
            // $finalImagePath = public_path('uploads/') . $fileName;
            File::makeDirectory(dirname($finalImagePath),0755, true, true);
            File::move($tempImagePath, $finalImagePath);
            
            // Store Image
            $lastImageId = Image::create([
                'path' => url('uploads', $fileName),
                'source' => 'original',
                ])->image_id;
                
            //Store image ref
            Image_ref::create([
                'ref_type' => $formFields['tag'],
                'image_id' => $lastImageId,
                'article_id' => $lastInsertedId,
            ]);
        }

        if ($formFields['status'] === 'pending') {
            $response = '/pages';
            return $response;
        } else {
            if ($formFields['tag'] === 'research' || $formFields['tag'] === 'project') {
                $response = '/research';
                return $response;
            } else {
                $response = '/post'.'/'. $lastInsertedId; 
                return $response;
            }
        }
        
    }

    // Update article
    public function update(Request $request) {
        $article_id = $request->input('article_id');
        $article = Article::findOrFail($article_id);
        $lastImageId = null;

        $images_to_delete = $article->images;
        // Delete all articles in the public folder
        foreach ($images_to_delete as $image) {
            $full_path = $image->path;
            $path = preg_replace('/.+\/uploads\//', '\\uploads\\', $full_path);
            $path = public_path().'/../../public_html/' . $path;
            // $path = public_path($path);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $article->images()->delete();
        // Validate input
        $formFields = $request->validate([  
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'image_list' => ['required', 'string'],
            'desc' => ['required','string'],
            'body' => ['required','string'],
            'author' => ['required','string', 'min:3', 'max:250'],
            'date' => ['required'],
            'tag' => ['required','string'],
        ]);

        //Change all image links directory from temp to upload
        $pattern2 = '/temp_images/';
        $formFields['body'] = preg_replace($pattern2,'uploads', $formFields['body']);


        // Sanitize Input
        $formFields['title'] = htmlspecialchars($formFields['title'], ENT_QUOTES,'UTF-8');
        $formFields['desc'] = htmlspecialchars($formFields['desc'], ENT_QUOTES,'UTF-8');
        $formFields['author'] = htmlspecialchars($formFields['author'], ENT_QUOTES,'UTF-8');
        $formFields['tag'] = htmlspecialchars($formFields['tag'], ENT_QUOTES,'UTF-8');
        
        
        // Store Article
        $article->update([
             'title' => $formFields['title'],
             'desc' => $formFields['desc'],
             'body' => $formFields['body'],
             'author' => $formFields['author'],
             'status' => 'published',
             // Return read minutes
             'read_min' => max(1, ceil(str_word_count(strip_tags($formFields['body'])) / 200)),
             'starting_at' => $formFields['date'],
             'tag' => $formFields['tag'],
        ]);

        $pattern1 = '/.+\/temp_images\//';
        $imageList = preg_replace($pattern1, '', json_decode($formFields['image_list'], true));
        //Move list of images from temporal to final destination
        
        foreach ($imageList as $value) {
            $fileName =  $value;
            $tempImagePath = storage_path('app/temp_images/') . $fileName;
             $finalImagePath = public_path().'/../../public_html/uploads/' . $fileName;
             // $finalImagePath = public_path('uploads/') . $fileName;
            File::makeDirectory(dirname($finalImagePath),0755, true, true);
            File::move($tempImagePath, $finalImagePath);
            
            // Store Image
            $lastImageId = Image::create([
                'path' => url('uploads', $fileName),
                'source' => 'original',
                ])->image_id;
                
            //Store image ref
            Image_ref::create([
                'ref_type' => $formFields['tag'],
                'image_id' => $lastImageId,
                'article_id' => $article_id,
            ]);
        }

        if ($formFields['status'] === 'pending') {
            $response = '/pages';
            return $response;
        } else {
            if ($formFields['tag'] === 'research' || $formFields['tag'] === 'project') {
                $response = '/research';
                return $response;
            } else {
                $response = '/post'.'/'. $article_id; 
                return $response;
            }
        }
    }

    public function delete(Article $article) {
        if (!$article) {
            // Article doesn't exist, redirect back with a flash message
            return redirect()->route('home')->with('error', 'Article not found.');
        }

        $images_to_delete = $article->images;
        // Delete all articles in the public folder
        foreach ($images_to_delete as $image) {
            $full_path = $image->path;
            $path = preg_replace('/.+\/uploads\//', 'uploads\\', $full_path);
            $path = public_path().'/../../public_html/' . $path;
            // $path = public_path($path);
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $article->images()->delete();
        $article->delete();
        return redirect()->route('pages')->with('message', 'Article successfuly deleted.');
    }

    public function publish(Article $article) {
        if (!$article) {
            // Article doesn't exist, redirect back with a flash message
            return redirect()->route('home')->with('error', 'Article not found.');
        }

        if ($article->status === 'published') {
            // Article is already published, redirect back with a flash message
            return redirect()->route('pages')->with('error', 'Article has already been published.');
        }

        $article->update([
            'status' => 'published',            
        ]);

        return redirect()->route('pages')->with('message', 'Article successfuly published.');
    }
}
