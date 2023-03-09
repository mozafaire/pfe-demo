@extends('dashboard.author.home')
@section('create_article_content')

<form method="POST" action="{{ route('author.uploade') }}"  enctype="multipart/form-data">
	@csrf
	<label for="">title:</label>
	<input type="text" name="title">
	<br>
	<label for="">category:</label>
	<input type="text" name='category'>
	<br>
	<label for="">abstract</label>
	<input type="text" name='abstract' >
	<br>
	<br>
	<label for="">pdf:</label>
	<input type="file" name="obj_pdf" required>
	<label for="">pic:</label>
	<input type="file" name="pic" required>
	<input type="submit">
</form>
@endsection
