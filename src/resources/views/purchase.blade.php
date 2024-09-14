@extends('header')

@section('content')
    <div class="flex flex-col md:flex-row w-[80%] mx-auto mt-[5%]">
        <div class="w-full md:w-[50%]">
            <div class="flex flex-col items-center md:flex-row">
                <img src="{{ asset('storage/'.$item->img_path)}}" class="w-1/2 md:w-[30%]">
                <div class="md:ml-[100px]">
                    <h1 class="mb-[10px] text-2xl font-bold">{{$item->name}}</h1>
                    <p class="text-xl">¥{{$item->price}}</p>
                </div>
            </div>
            <form action="/purchase/edit" method="post" class="flex justify-between mt-[100px]">
                @csrf
                <p class="text-xl">支払い方法</p>
                <input type="hidden" name="itemId" value="{{$item->id}}">
                <input type="hidden" name="userId" value="{{$user->id}}">
                <input type="submit" class="text-blue-400" name="pay" value="変更する">
            </form>
            @if(is_null($pay))
            <p class="mt-[20px]">未選択</p>
            @else
            <p class="mt-[20px]">{{$pay->method}}</p>
            @endif
            <form action="/purchase/edit" method="post" class="flex justify-between mt-[100px]">
                @csrf
                <p class="text-xl">配送先</p>
                <input type="hidden" name="itemId" value="{{$item->id}}">
                <input type="hidden" name="userId" value="{{$user->id}}">
                <input type="submit" class="text-blue-400" name="editAddress" value="変更する">
            </form>
            @if(is_null($user->post_code) or is_null($user->address))
            <p class="mt-[20px]">未選択</p>
            @else
            <p class="mt-[20px]">〒{{$user->post_code}} {{$user->address}} {{$user->building}}</p>
            @endif
        </div>
        <div class="my-16 md:w-[40%] md:ml-[10%] md:mt-0">
            <div class="w-full border-solid border-2 border-gray-300">
                <div class="pt-[10px] px-[50px]">
                    <div class="flex justify-between mb-[50px]">
                        <p class="">商品代金</p>
                        <p class="">¥{{$item->price}}</p>
                    </div>
                    <div class="flex justify-between mb-[20px]">
                        <p class="">支払い金額</p>
                        <p class="">¥{{$item->price}}</p>
                    </div>
                    <div class="flex justify-between pb-[10px]">
                        <p class="">支払い方法</p>
                        @if(is_null($pay))
                        <p class="">未選択</p>
                        @else
                        <p class="">{{$pay->method}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <a href="/checkout?id={{$item->id}}"><input type="submit" class="w-full mt-[20px] py-[5px] bg-red-500 text-white text-center" name="" value="購入する"></a>
        </div>
    </div>
@endsection