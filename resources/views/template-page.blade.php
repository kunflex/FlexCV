<x-app-layout>
    <x-slot name="header">
        <h3>
            {{ __('Templates') }}
        </h3>
    </x-slot>

    <form id="templateForm" action="{{url('select/template')}}" method="post">
        @csrf
        <div class="custom-flow">
            <div class="custom-box">
                <img src="{{asset('assets/img/template1.png')}}" alt="">
                <div class="custom-box-layer">
                    <div onclick="setTemplate('template1')">Use this template</div>
                    <input type="checkbox" name="template1" id="template1" hidden>
                </div>
            </div>
    
            <div class="custom-box">
                <img src="{{asset('assets/img/template2.png')}}" alt="">
                <div class="custom-box-layer">
                    <div onclick="setTemplate('template2')">Use this template</div>
                    <input type="checkbox" name="template2" id="template2" hidden>
                </div>
            </div>
    
            <div class="custom-box">
                <img src="{{asset('assets/img/template3.png')}}" alt="">
                <div class="custom-box-layer">
                    <div onclick="setTemplate('template3')">Use this template</div>
                    <input type="checkbox" name="template3" id="template3" hidden>
                </div>
            </div>
    
            <div class="custom-box">
                <img src="{{asset('assets/img/template4.png')}}" alt="">
                <div class="custom-box-layer">
                    <div onclick="setTemplate('template4')">Use this template</div>
                    <input type="checkbox" name="template4" id="template4" hidden>
                </div>
            </div>
    
            <div class="custom-box">
                <img src="{{asset('assets/img/template1.png')}}" alt="">
                <div class="custom-box-layer">
                    <div onclick="setTemplate('template5')">Use this template</div>
                    <input type="checkbox" name="template5" id="template5" hidden>
                </div>
            </div>
    
            <div class="custom-box">
                <img src="{{asset('assets/img/template1.png')}}" alt="">
                <div class="custom-box-layer">
                    <div onclick="setTemplate('template6')">Use this template</div>
                    <input type="checkbox" name="template6" id="template6" hidden>
                </div>
            </div>
    
            <div class="custom-box">
                <img src="{{asset('assets/img/template1.png')}}" alt="">
                <div class="custom-box-layer">
                    <div onclick="setTemplate('template7')">Use this template</div>
                    <input type="checkbox" name="template7" id="template7" hidden>
                </div>
            </div>
    
            <div class="custom-box">
                <img src="{{asset('assets/img/template1.png')}}" alt="">
                <div class="custom-box-layer">
                    <div onclick="setTemplate('template8')">Use this template</div>
                    <input type="checkbox" name="template8" id="template8" hidden>
                </div>
            </div>
            
        </div>
        <button type="submit" hidden>submit</button>
    </form>
    <script>
        function setTemplate(templateId) {
            var input = document.getElementById(templateId);
            if (input) {
                input.checked = true;
                document.getElementById('templateForm').submit();
            }
        }
    </script>
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
