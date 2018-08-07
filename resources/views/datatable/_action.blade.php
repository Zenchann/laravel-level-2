{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm',
                 'data-confirm' => $confirm_message] ) !!}
    <a class="btn btn-warning" href="{{ $edit_url }}">Ubah</a> &nbsp; || &nbsp;
    <a class="btn btn-info" href="{{ $show_url }}">Lihat</a> &nbsp; || &nbsp; 
    {!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}