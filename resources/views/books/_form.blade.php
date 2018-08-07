<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'Judul', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-12">
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('author_id') ? 'has-error' : '' !!}">
    {!! Form::label('author_id', 'Penulis', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-12">
        {!! Form::select('author_id', [''=>'']+App\Author::pluck('name','id')->all(), null,['class'=>'js-selectize','placeholder'=>'Pilih Penulis']) !!}
        {!! $errors->first('author_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
    {!! Form::label('amount', 'Jumlah', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-12">
        {!! Form::number('amount', null, ['class'=>'form-control', 'min'=>1]) !!}
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
        @if (isset($book))
           <p class="help-block">{{ $book->borrowed }} buku sedang dipinjam</p>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
    {!! Form::label('cover', 'Cover', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-12">
        {!! Form::file('cover') !!}
        @if (isset($book) && $book->cover)
            <p>
            <br>
            <img src="{{ asset('img/'.$book->cover) }}" style="width:250px; height:250px;" alt="">
            </p>
        @endif
        {!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-12 col-md-offset-2">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>