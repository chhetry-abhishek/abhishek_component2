@extends('layout.app')

@section('title','Book Shop')

@section('body')
<div class="row">
            @if(Session::get('success'))
                <span>{{Session::get('success')}}</span>
            @endif
            @if(Session::get('fail'))
                <span>{{Session::get('fail')}}</span>
            @endif
    <div class="form">
        @foreach($products as $data)
        <form action="/update/{{$data['id']}}" method="post">
            @csrf
            @method('put')
            @if(Session::get('success'))
                <span>{{Session::get('success')}}</span>
            @endif
            @if(Session::get('fail'))
                <span>{{Session::get('fail')}}</span>
            @endif
            <input type="text" name="title" placeholder="Enter title here" value="{{$data['title']}}">
            @if($errors->has('title'))
                <p>{{$errors->first('title')}}</p>
            @endif
            <input type="text" name="fname" placeholder="First Name (Optional)" value="{{$data['firstname']}}">
            @if($errors->has('fname'))
                <p>{{$errors->first('fname')}}</p> 
            @endif
            <input type="text" name="sname" placeholder="surname/band" value="{{$data['mainname']}}">
            @if($errors->has('sname'))
                <p>{{$errors->first('sname')}}</p> 
            @endif
            <input type="text" name="price" placeholder="Enter Price" value="{{$data['price']}}" >
            @if($errors->has('price'))
                <p>{{$errors->first('price')}}</p> 
            @endif
            @if($data['type']=='book')
            <input type="text" name="pages" placeholder="pages/playlength" value="{{$data['numpages']}}">
            @else
            <input type="text" name="pages" placeholder="pages/playlength" value="{{$data['playlength']}}">
            @endif
            @if($errors->has('pages'))
                <p>{{$errors->first('pages')}}</p> 
            @endif
            <input type="submit" value="Edit">
        </form>
        <form action="/delete/{{$data['id']}}" method="post">
        @csrf
        @method('delete')
            <input type="submit" value="Delete">
        </form>
        @endforeach
    </div>
</div>


@endsection