<?php

namespace App\Http\Controllers\article;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ArticleController extends Controller
{
    public function index_create_article(){
        return view('dashboard.author.article.create_article'); 
    }
    

    public function index_show_libre_article(){
        //$articles = Article::where('etat','=','traitement')->get();
        $authId = auth::user()->email;
        $articles = DB::table('articles')->select('id','title','category','etat','authorId','editorId','reviewer1Id','reviewer2Id')->where('authorID','=',$authId)->where('etat','=','libre')->get();
        return view('dashboard.author.article.show_traitement_article')->with('articles',$articles);
    }

    public function index_show_traitement_article(){
        //$articles = Article::where('etat','=','traitement')->get();
        $authId = auth::user()->email;
        $articles = DB::table('articles')->select('id','title','category','etat','authorId','editorId','reviewer1Id','reviewer2Id')->where('authorID','=',$authId)->where('etat','=','traitement')->get();
        return view('dashboard.author.article.show_traitement_article')->with('articles',$articles);
    }

    public function index_show_refuse_article(){
        $authId = auth::user()->email;
        $articles = DB::table('articles')->select('id','title','category','etat','authorId','editorId','reviewer1Id','reviewer2Id')->where('authorID','=',$authId)->where('etat','=','refuse')->get();
        return view('dashboard.author.article.show_refuse_article')->with('articles',$articles);
    }

    public function index_show_accept_article(){
        $authId = auth::user()->email;
        $articles = DB::table('articles')->select('id','title','category','etat','authorId','editorId','reviewer1Id','reviewer2Id')->where('authorID','=',$authId)->where('etat','=','accept')->get();
        return view('dashboard.author.article.show_accept_article')->with('articles',$articles);
    }



    public function show_libre_article(){
        $articles = DB::table('articles')->select('id','title','category','etat','authorId','editorId','reviewer1Id','reviewer2Id')->where('etat','=','libre')->get();
        return view('dashboard.editor.article.show_libre_article')->with('articles',$articles);
    }


    public function validation_article(Request $request){
        $request->validate(['id'=>'required']);
        $req = $request->id;
        $articles = DB::table('articles')->select('id','title','category','etat','authorId','editorId','reviewer1Id','reviewer2Id')->where('id','=',$req)->get();
        return view('dashboard.editor.article.validation_article')->with('articles',$articles);
    }

    public function update_etat(Request $request){
        
        $request->validate(['id'=>'required']);
        $editorId = $request->editorId;
        $id = $request->id;
        $etat = $request->etat;

        DB::table('articles')->where('id',$id)->update(['etat'=> $etat,'editorId'=>$editorId]);
        return view('dashboard.editor.home');
    }



    public function uploade(Request $request){
        $request->validate([
            'title'=>['required','string'],
            'category'=>['required','string'],
            'abstract'=>['required','string'],
            'obj_pdf'=>'mimes:jpeg,bmp,png,pdf,jpg',
            'pic'=>'mimes:jpeg,bmp,png,pdf,jpg',                        
        ]);

        if ($request->hasFile('obj_pdf') && $request->hasFile('pic')) {           
            $path_pdf = $request->file('obj_pdf')->getRealPath();
            $ext_pdf = $request->file('obj_pdf')->extension();
            $doc_pdf = file_get_contents($path_pdf);
            $base64_pdf = base64_encode($doc_pdf);
            $mime_pdf = $request->file('obj_pdf')->getClientMimeType();

            $path_pic = $request->file('pic')->getRealPath();
            $ext_pic = $request->file('pic')->extension();
            $doc_pic = file_get_contents($path_pic);
            $base64_pic = base64_encode($doc_pic);
            $mime_pic = $request->file('pic')->getClientMimeType();


            $article = new article();
            $article->title = $request->title;
            $article->category = $request->category;
            $article->abstract = $request->abstract;
            $article->obj_pdf = $doc_pdf;
            $article->pic = $doc_pic;
            $article->authorId = auth::guard('author')->user()->email;
            $article->etat  = 'traitement';
            $data = $article->save();
        }
        

      // DB::insert(  'insert into `article` (`title`, `category`, `abstract`, `authorId`, `etat`) values (bn,`lkkj`,`khalid.dima17@gmail.com`, `traitement`)');


      return redirect('/author/traitement-article');
    }
}
