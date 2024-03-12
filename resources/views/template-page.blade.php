<x-app-layout>
    <x-slot name="header">
        <h3>
            {{ __('Templates') }}
        </h3>
    </x-slot>

    <div class="custom-flow">
        <div class="custom-box">
            <img src="{{asset('assets/img/template1.png')}}" alt="">
            <div class="custom-box-layer">
                <div>Use this template</div>
            </div>
        </div>

        <div class="custom-box">
            <img src="{{asset('assets/img/template2.png')}}" alt="">
            <div class="custom-box-layer">
                <div>Use this template</div>
            </div>
        </div>

        <div class="custom-box">
            <img src="{{asset('assets/img/template3.png')}}" alt="">
            <div class="custom-box-layer">
                <div>Use this template</div>
            </div>
        </div>

        <div class="custom-box">
            <img src="{{asset('assets/img/template4.png')}}" alt="">
            <div class="custom-box-layer">
                <div>Use this template</div>
            </div>
        </div>

        <div class="custom-box">
            <img src="{{asset('assets/img/template1.png')}}" alt="">
            <div class="custom-box-layer">
                <div>Use this template</div>
            </div>
        </div>

        <div class="custom-box">
            <img src="{{asset('assets/img/template1.png')}}" alt="">
            <div class="custom-box-layer">
                <div>Use this template</div>
            </div>
        </div>

        <div class="custom-box">
            <img src="{{asset('assets/img/template1.png')}}" alt="">
            <div class="custom-box-layer">
                <div>Use this template</div>
            </div>
        </div>

        <div class="custom-box">
            <img src="{{asset('assets/img/template1.png')}}" alt="">
            <div class="custom-box-layer">
                <div>Use this template</div>
            </div>
        </div>
        
    </div>
</x-app-layout>

<style>
    .custom-flow{
        width: auto;
        height:auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 30px;
    }
    .custom-box{
        width:290px;
        height:350px;
        background-color:white;
        border-radius:8px;
    }
    .custom-box img{
        width:290px;
        height:350px;
        border-radius:8px;
    }
    
    .custom-box-layer{
        width:290px;
        height:350px;
        padding:10px;
        margin-top:-354px;
        background-color:transparent;
        position:absolute;
        text-align:center;
        user-select:none;
        border-radius:8px;
    }
    .custom-box-layer div{ 
        padding:10px;
        background-color:#0095ff;
        color:white;
        position:relative;
        text-align:center;
        user-select:none;
        border-radius:8px;
        visibility:hidden;
        margin:40px;
        margin-top:220px;
        font-size:18px;
    }
    .custom-box-layer:hover{
        background-color:rgba(0, 0, 0, 0.4);
    }
    .custom-box:hover .custom-box-layer div{
        visibility:visible;
    }
</style>