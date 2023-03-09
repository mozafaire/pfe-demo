@extends('dashboard.editor.home')
@section('validation_article')
@foreach($articles as $article)
{{$editorId = auth::user()->email;}}
<form action="{{route('editor.update-etat')}}" method="get">
    <label for="">Set etat:</label>
    <input type="text" name="etat">
    <input type="hidden" name="id" value="{{$article->id}}">
    <button type="submit"> change</button>
    <input type="hidden" name="editorId" value="{{auth::user()->email;}}">
</form>
@endforeach
@endsection