
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">

<style>
    .badge:after{
        content:attr(value);
        font-size:12px;
        color: #fff;
        background: red;
        border-radius:50%;
        padding: 0 5px;
        position:relative;
        left:-8px;
        top:-10px;
        opacity:0.9;
    }

</style>
<a href="{{url('show_cart')}}">


<i class="fa badge fa-lg" value={{$count}}>
    &#xf07a;
</i>


</a>