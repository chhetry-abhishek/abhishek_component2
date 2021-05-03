@extends('layout.app')

@section('title','Book Shop')

@section('body')
<div class="row">
    <div class="book">
        Book
        @foreach($productdata as $data)
        @if($data['type']!= 'cd')
        <ul>
            <li>{{ $data['title'] }}</li>
            <li>{{ $data['mainname'] }}</li>
            <li>{{ $data['price'] }}</li>
            <li>{{ $data['numpages'] }}</li>

            <a href="/product/{{$data['id']}}">Select</a>
        </ul>
        @endif  
        @endforeach
    </div>
    <div class="cd">
        Cd
        @foreach($productdata as $data)
        @if($data['type']!= 'book')
        <ul>
            <li>{{ $data['title'] }}</li>
            <li>{{ $data['mainname'] }}</li>
            <li>{{ $data['price'] }}</li>
            <li>{{ $data['playlength'] }}</li>

            <a href="/product/{{$data['id']}}">Select</a>
        </ul>
        @endif  
        @endforeach
        
    </div>
    <div class="form">
        <form action="/add" method="post">
            @csrf
            <select name="type">
                <option value="book">Book</option>
                <option value="cd">CD</option>
            </select>
            <input type="text" name="title" placeholder="Enter title here">
            @if($errors->has('title'))
                <p>{{$errors->first('title')}}</p>
            @endif
            <input type="text" name="fname" placeholder="First Name (Optional)">
            @if($errors->has('fname'))
                <p>{{$errors->first('fname')}}</p> 
            @endif
            <input type="text" name="sname" placeholder="surname/band">
            @if($errors->has('sname'))
                <p>{{$errors->first('sname')}}</p> 
            @endif
            <input type="text" name="price" placeholder="Enter Price">
            @if($errors->has('price'))
                <p>{{$errors->first('price')}}</p> 
            @endif
            <input type="text" name="pages" placeholder="pages/playlength">
            @if($errors->has('pages'))
                <p>{{$errors->first('pages')}}</p> 
            @endif
            <input type="submit" value="Add New">
        </form>
    </div>
</div>


@endsection